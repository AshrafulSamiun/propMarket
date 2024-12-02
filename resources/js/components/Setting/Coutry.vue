<template>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card card-default widget wow fadeInDown animated " style=" animation-delay: 0.18s;">
        <div class="card-heading">
          <div>
            <div align="left" style="float:left">
              <h2>Country</h2>
            </div>
            <div align="right" style="float:right">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewCountry"
                      @click.prevent="addCountry()">Create New Country
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-2 pull-left">
            <input type="text" v-model="filter" class="form-control" placeholder="Search..." style="width:400px;"/>
          </div>
          <vue3-datatable :rows="rows" :columns="columns" :sortable="true" :search="filter" class="advanced-table whitespace-nowrap">
            <template #sl="data">
              <strong class="text-info">{{ data.value.sl }}</strong>
            </template>
            <template #country_name="data">
              <span class="font-semibold">{{ data.value.country_name }}</span>
            </template>
            <template #short_name="data">
              <span class="font-semibold">{{ data.value.short_name }}</span>
            </template>
            <template #country_code="data">
              <span class="font-semibold">{{ data.value.country_code }}</span>
            </template>
            <template #status="data">
              <span class="font-semibold">{{ StatusArr[data.value.status] }}</span>
            </template>
            <template #buttons="data">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewCountry" @click.prevent="editCountry(data.value)">Edit</button>
              <button v-show="delete_permission" class="btn btn-danger btn-sm"@click.prevent="deleteCountry(data.value.id)">Delete</button>
            </template>
          </vue3-datatable>
        </div>
      </div>

      <!--  MOdel  -->
      <div class="modal fade" id="addNewCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
           aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 id="messagebox_main"></h2>
              <h5 class="modal-title" v-show="!editmode" id="">Add New Country</h5>
              <h5 class="modal-title" v-show="editmode" id="">Update Country</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form @submit.prevent="editmode ? updateCountry() : createCountry()" @keydown="form.onKeydown($event)">
                <div class="form-group">
                  <label>Country Name :</label>
                  <input v-model="form.country_name" type="text" name="country_name"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('country_name') }">
                  <input v-model="form.id" type="hidden" name="id">
                </div>
                <div class="form-group">
                  <label>Short Name :</label>
                  <input v-model="form.short_name" type="text" name="short_name"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('short_name') }">
                </div>
                <div class="form-group">
                  <label>Country Code: </label>
                  <input v-model="form.country_code" type="text" name="country_code"
                         class="form-control" :class="{ 'is-invalid': form.errors.has('country_code') }">
                </div>

                <div class="form-group">
                  <label> Status :</label>
                  <select v-model="form.status_active" name="status_active"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('status_active') }">
                    <option disabled value="">Please select Status</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                    <option value="3">Cancel</option>
                  </select>
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
        country_code: '',
        short_name: '',
        country_name: '',
        status_active: '',
        id: ''
      }),
      columns: ref([
        {title: 'SL', field: 'id', align: 'center'},
        {title: 'Country Name', field: 'country_name'},
        {title: 'Module Name', field: 'short_name'},
        {title: 'Country Route', field: 'country_code'},
        {title: 'Status', field: 'status_active'},
        {title: '', field: 'buttons', sort: false},
      ]),
      rows: [],
      row: {},
      StatusArr: ['Select', 'Active', 'Inactive', 'Cancell'],
      page: 1,
      per_page: 10,
      expanded: null
    }
  },

  created: function () {
    this.user_manu_name = this.$route.name;
    this.fetchCountrys();
  },

  methods: {
    fetchCountrys() {
      let uri = '/Countries';
      window.axios.get(uri).then((response) => {
        this.rows = ref(response.data);
      });
    },

    editCountry(row) {
      this.form.reset();
      this.editmode = true;
      this.form.fill(row);
    },
    addCountry() {

      this.form.reset();
      this.editmode = false;
    },

    updateCountry() {
      this.form.put('/Countries/' + this.form.id)
          .then(() => {
            //success
            $('.modal.in').modal('hide');
            $('.modal-backdrop').remove();

            showToast('Data Update Successfully', 'success');
            this.form.reset();
            this.fetchCountrys();
          })
          .catch(() => {
            showAlert("failed!", "there was some wrong", "warning");
          });
    },

    createCountry() {
      this.form.post('/Countries').then(({data}) => {
        $('.modal.in').modal('hide');
        $('.modal-backdrop').remove();
        showToast('Data Save Successfully', 'success');

        this.form.reset();
        this.fetchCountrys();
      })
    },
    deleteCountry(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        this.form.delete('/Countries/' + id).then(() => {
          if (result.value) {
            showAlert(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );
            this.fetchCountrys();
          }
        }).catch(() => {
          showAlert("failed!", "there was some wrong", "warning");
        });
      })
    }
  }
}
</script>