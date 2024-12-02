<template>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card card-default widget wow fadeInDown animated " style=" animation-delay: 0.18s;">

        <div class="card-heading">
          <div>
            <div align="left" style="float:left">
              <h2>Menu</h2>
            </div>

            <div align="right" style="float:right">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewMenu"
                      @click.prevent="addMenu()">Create New Menu
              </button>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="mb-2">
            <input type="text" v-model="filter" class="form-control" placeholder="Search..." style="width:400px;"/>
          </div>
          <vue3-datatable :rows="rows" :columns="columns" :sortable="true" :search="filter" class="advanced-table whitespace-nowrap">
            <template #id="data">
              <strong class="text-info">{{ data.value.id }}</strong>
            </template>
            <template #menuName="data">
              <span class="font-semibold">{{ data.value.menuName }}</span>
            </template>
            <template #moduleName="data">
              <span class="font-semibold">{{ data.value.moduleName }}</span>
            </template>
            <template #menuRoute="data">
              <span class="font-semibold">{{ data.value.menuRoute }}</span>
            </template>
            <template #status="data">
              <span class="font-semibold">{{ StatusArr[data.value.status] }}</span>
            </template>
            <template #buttons="data">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewMenu" @click.prevent="editMenu(data.value)">Edit</button>
              <button v-show="delete_permission" class="btn btn-danger btn-sm" @click.prevent="deletemenu(data.value.id)">Delete</button>
            </template>
          </vue3-datatable>
        </div>
      </div>

      <!--  MOdel  -->
      <div class="modal fade" id="addNewMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
           aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h2 id="messagebox_main"></h2>
              <h5 class="modal-title" v-show="!editmode" id="">Add New Module</h5>
              <h5 class="modal-title" v-show="editmode" id="">Update Module</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form @submit.prevent="editmode ? updateMenu() : createMenu()" @keydown="form.onKeydown($event)">
                <div class="form-group">
                  <label>Menu Name :</label>
                  <input v-model="form.menuName" type="text" name="menuName"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('menuName') }">
                  <input v-model="form.id" type="hidden" name="id">
                </div>

                <div class="form-group">
                  <label>Module Name :</label>
                  <select v-model="form.moduleId" type="moduleId" name="moduleId"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('moduleId') }">
                    <option disabled value="">Please select Module</option>
                    <option v-for="(module,index) in modules" :value="module.id">{{ module.moduleName }}</option>


                  </select>
                </div>
                <div class="form-group">
                  <label>Menu Route: </label>
                  <input v-model="form.menuRoute" type="text" name="menuRoute"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('menuRoute') }">
                </div>

                <div class="form-group">
                  <label> Status :</label>
                  <select v-model="form.status" type="status" name="status"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                    <option disabled value="">Please select Status</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                    <option value="3">Cancel</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Sl No: </label>
                  <input v-model="form.slno" type="number" name="slno"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('slno') }">
                </div>

                <button :disabled="form.busy" v-show="!editmode && save_permission" type="submit"
                        class="btn btn-primary btn-sm">Create
                </button>
                <button :disabled="form.busy" v-show="editmode && update_permission" type="submit"
                        class="btn btn-primary btn-sm">Update
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- model end -->

    </div><!-- /.col-md-12 -->
  </div>

</template>

<script>
import {ref} from "vue";
import Vue3Datatable from "@bhplugin/vue3-datatable";
import "@bhplugin/vue3-datatable/dist/style.css";

export default {
  name: 'list-product-categories',
  components: {
    Vue3Datatable
  },
  data() {
    return {
      editmode: false,
      save_permission: true,
      update_permission: true,
      delete_permission: true,
      filter: '',
      form: new Form({
        moduleId: '',
        menuRoute: '',
        menuName: '',
        slno: '',
        status: '',
        id: ''
      }),
      columns: ref([
        {title: 'SL', field: 'id', align: 'center'},
        {title: 'Menu Name', field: 'menuName'},
        {title: 'Module Name', field: 'moduleName'},
        {title: 'Menu Route', field: 'menuRoute'},
        {title: 'Status', field: 'status'},
        {title: '', field: 'buttons', sort: false},
      ]),
      rows: [],
      row: {
        moduleId: '',
        menuRoute: '',
        menuName: '',
        slno: '',
        status: '',
        id: ''
      },
      modules: [],
      module: {
        id: '',
        moduleName: '',
        modSlNo: '',
        status: ''
      },
      //serialNo:0,
      StatusArr: ['Select', 'Active', 'Inactive', 'Cancell'],
      page: 1,
      per_page: 10,
      expanded: null
    }
  },

  created: function () {

    this.user_menu_name = this.$route.name;
    this.fetchMenus();
    this.fetchModules();
  },

  methods: {

    fetchMenus() {
      let uri = '/api/MenuApi';
      window.axios.get(uri).then((response) => {
        this.rows = ref(response.data);
      });
    },

    fetchModules() {
      let uri = '/api/ModuleApi';
      window.axios.get(uri).then((response) => {
        this.modules = response.data;
      });
    },

    editMenu(row) {
      this.form.reset();
      this.editmode = true;
      this.form.fill(row);
    },
    addMenu() {

      this.form.reset();
      this.editmode = false;
    },

    updateMenu() {

      this.form.put('/Menus/' + this.form.id)
          .then(() => {
            //success
            $('.modal.in').modal('hide');
            $('.modal-backdrop').remove();

            showToast('Data Update Successfully', 'success');

            this.form.reset();
            this.fetchMenus();
          })
          .catch(() => {
            showAlert("failed!", "there was some wrong", "warning");

          });
    },

    createMenu() {
      this.form.post('/Menus').then(({data}) => {

        $('.modal.in').modal('hide');
        $('.modal-backdrop').remove();
        showToast('Data Save Successfully', 'success');
        this.form.reset();
        this.fetchMenus();
      })
    },
    deletemenu(id) {

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {

        this.form.delete('/Menus/' + id).then(() => {

          if (result.value) {
            showAlert(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );
            this.fetchMenus();
          }

        }).catch(() => {
          showAlert("failed!", "there was some wrong", "warning");
        });

      })
    }
  }

}

</script>