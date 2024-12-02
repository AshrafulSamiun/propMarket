<template>
  <fieldset>
    <form id="msform" @submit.prevent="editmode ? updateTax() : createTex()" @keydown="form.onKeydown($event)">
      <div class="form-card">
        <h1 class="page-head">Fixed Assets</h1>
        <div class="text-center">
          <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                  @click="reset_form()">New
          </button>
          <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                  @click="reset_list()">List
          </button>
          <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                  v-show="editmode">Print
          </button>
        </div>
        <div v-if="list_showable" class="card-body">
          <div class="mb-2">
            <input type="text" v-model="filter" class="form-control" placeholder="Search..." style="width:400px;"/>
          </div>
          <vue3-datatable :rows="rows" :columns="columns" :sortable="true" :search="filter" class="advanced-table whitespace-nowrap">
            <template #sl="data">
              <strong class="text-info">{{ data.value.sl }}</strong>
            </template>
            <template #system_no="data">
              <span class="font-semibold">{{ data.value.system_no }}</span>
            </template>
            <template #asset_category_string="data">
              <span class="font-semibold">{{ data.value.asset_category_string }}</span>
            </template>
            <template #asset_name="data">
              <span class="font-semibold">{{ data.value.asset_name }}</span>
            </template>
            <template #serial_no="data">
              <span class="font-semibold">{{ data.value.serial_no }}</span>
            </template>
            <template #uom_string="data">
              <span class="font-semibold">{{ data.value.uom_string }}</span>
            </template>
            <template #barcode="data">
              <span class="font-semibold">{{ data.value.barcode }}</span>
            </template>
            <template #model="data">
              <span class="font-semibold">{{ data.value.model }}</span>
            </template>
            <template #color="data">
              <span class="font-semibold">{{ data.value.color }}</span>
            </template>
            <template #buttons="data">
              <button class="btn btn-primary btn-sm" @click.prevent="editFixedAsset(data.value.id)">Edit</button>
              <button class="btn btn-danger btn-sm" @click.prevent="TaxDelete(data.value.id)">Delete</button>
            </template>
          </vue3-datatable>
        </div>
        <div v-if="!list_showable">
          <div class="form-folder">
            <h3><i class="fa fa-hand-point-right"></i> Service Items:</h3>
            <div class="form-holder">
              <div class="row align-self-stretch">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-box-outer">
                    <label class="fieldlabels">Asset Code:</label>
                    <input v-model="form.system_no"
                           type="text"
                           name="system_no"
                           placeholder="Auto Generated"
                           :class="{ 'is-invalid': form.errors.has('system_no') }" readonly/>

                    <label class="fieldlabels">Name:</label>
                    <input v-model="form.asset_name"
                           type="text"
                           name="asset_name"
                           placeholder="Type Name"
                           :class="{ 'is-invalid': form.errors.has('asset_name') }"/>

                    <label class="fieldlabels">Uom:</label>
                    <select v-model="form.uom"
                            name="uom"
                            class="custom-select"
                            :class="{ 'is-invalid': form.errors.has('uom') }">
                      <option disabled value="">--Select UOM--</option>
                      <option v-for="(uom,index) in uom_arr" :value="index">{{ uom }}</option>
                    </select>

                    <label class="fieldlabels">Asset Category:</label>
                    <select v-model="form.asset_category"
                            name="asset_category"
                            class="custom-select"
                            @click="change_asset_category"
                            :class="{ 'is-invalid': form.errors.has('asset_category') }">
                      <option disabled value="">--Select Item Category--</option>
                      <option v-for="(m_category,ind) in main_category_arr" :value="ind">{{ m_category }}</option>
                      <option value="Add" style="background-color:rgb(0, 112, 192) !important;color:#fff; ">--Add--
                      </option>
                    </select>

                    <label class="fieldlabels">Sub Category:</label>
                    <select v-model="form.sub_category"
                            name="sub_category"
                            class="custom-select"
                            :class="{ 'is-invalid': form.errors.has('sub_category') }">
                      <option disabled value="">--Select Sub Category--</option>
                      <option v-for="(s_category,index1) in sub_category_arr[form.asset_category]" :value="index1">
                        {{ s_category }}
                      </option>
                      <option value="Add" style="background-color:rgb(0, 112, 192) !important;color:#fff; ">--Add--
                      </option>
                    </select>

                    <label class="fieldlabels">Active:</label>
                    <select v-model="form.status_active"
                            name="status_active"
                            class="custom-select"
                            :class="{ 'is-invalid': form.errors.has('status_active') }">
                      <option disabled value="">--Select Status--</option>
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                    </select>

                    <label class="fieldlabels">Comments:</label>
                    <textarea
                        v-model="form.comments"
                        style="height:70px;"
                        id="comments"
                        name="comments"
                        rows="6"
                        cols="100"
                        placeholder="Type comments"
                        :class="{ 'is-invalid': form.errors.has('comments') }">
                    </textarea>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-box-outer">
                    <h4>Specifications</h4>
                    <label class="fieldlabels">Condition:</label>
                    <select v-model="form.condition"
                            name="condition"
                            class="custom-select"
                            :class="{ 'is-invalid': form.errors.has('condition') }">
                      <option disabled value="">--Select Condition--</option>
                      <option value="1">New</option>
                      <option value="2">Used</option>
                    </select>

                    <label class="fieldlabels">Barcode No:</label>
                    <input v-model="form.barcode"
                           type="text"
                           name="barcode"
                           placeholder="Type Name"
                           :class="{ 'is-invalid': form.errors.has('barcode') }"/>

                    <label class="fieldlabels">Serial No:</label>
                    <input v-model="form.serial_no"
                           type="text"
                           name="serial_no"
                           placeholder="Type Serial No"
                           :class="{ 'is-invalid': form.errors.has('serial_no') }"/>

                    <label class="fieldlabels">Model:</label>
                    <input v-model="form.model"
                           type="text"
                           name="model"
                           placeholder="Type Model"
                           :class="{ 'is-invalid': form.errors.has('model') }"/>

                    <label class="fieldlabels">Color:</label>
                    <input v-model="form.color"
                           type="text"
                           name="color"
                           placeholder="Type Color"
                           :class="{ 'is-invalid': form.errors.has('color') }"/>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box-outer">
                    <h4>Dimention</h4>
                    <table class="table table_narrow">
                      <thead>
                      <tr>
                        <th scope="col" width="15%">Dimension</th>
                        <th scope="col" width="45%">UOM</th>
                        <th scope="col" width="40%">Qty</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Length</td>
                        <td>
                          <select v-model="form.length_uom"
                                  name="length_uom"
                                  class="custom-select"
                                  :class="{ 'is-invalid': form.errors.has('length_uom') }">
                            <option disabled value="">--Select UOM--</option>
                            <option v-for="(uom,index) in uom_arr" :value="index">{{ uom }}</option>
                          </select>
                        </td>
                        <td>
                          <input v-model="form.item_length"
                                 type="text"
                                 name="item_length"
                                 placeholder="Type Item Length"
                                 :class="{ 'is-invalid': form.errors.has('item_length') }"/>
                        </td>
                      </tr>
                      <tr>
                        <td>Width</td>
                        <td>
                          <select v-model="form.width_uom"
                                  name="width_uom"
                                  class="custom-select"
                                  :class="{ 'is-invalid': form.errors.has('width_uom') }">
                            <option disabled value="">--Select UOM--</option>
                            <option v-for="(uom,index) in uom_arr" :value="index">{{ uom }}</option>
                          </select>
                        </td>
                        <td>
                          <input v-model="form.item_width"
                                 type="text"
                                 name="item_width"
                                 placeholder="Type Item Width"
                                 :class="{ 'is-invalid': form.errors.has('item_width') }"/>
                        </td>
                      </tr>
                      <tr>
                        <td>Height</td>
                        <td>
                          <select v-model="form.height_uom"
                                  name="height_uom"
                                  class="custom-select"
                                  :class="{ 'is-invalid': form.errors.has('height_uom') }">
                            <option disabled value="">--Select UOM--</option>
                            <option v-for="(uom,index) in uom_arr" :value="index">{{ uom }}</option>
                          </select>
                        </td>
                        <td>
                          <input v-model="form.item_height"
                                 type="text"
                                 name="item_height"
                                 placeholder="Type Item Height"
                                 :class="{ 'is-invalid': form.errors.has('item_height') }"/>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <h4>Chart Of Account</h4>
                    <table class="table table_narrow">
                      <thead>
                      <tr>
                        <th> Account Type</th>
                        <th> Account code-Name</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr v-for="(accountType,index) in form.account_type_arr">
                        <td> {{ accountType.name }}</td>
                        <td>
                          <input v-model="accountType.chart_of_account"
                                 type="text"
                                 name="chart_of_account[]"
                                 @dblclick="chart_of_account_popup(index)"
                                 placeholder="Browse Chart Of Account"
                                 :class="{ 'is-invalid': form.errors.has('chart_of_account[]') }" readonly/>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>

          <div class="text-center" v-if="!list_showable">
            <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                    @click="reset_form()">New
            </button>
            <button :disabled="form.busy" type="submit" class="btn  btn-primary" style="min-width:110px"
                    v-show="editmode">Edit
            </button>
            <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                    v-show="editmode" @click.prevent="deleteTax()">Delete
            </button>
            <button :disabled="form.busy" type="submit" class="btn  btn-primary" style="min-width:110px"
                    v-show="!editmode">Void
            </button>
            <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                    v-show="!editmode" @click="save_stay(1)">Save-Stay
            </button>
            <button :disabled="form.busy" type="submit" class="btn  btn-primary" style="min-width:110px"
                    v-show="!editmode" @click="save_stay(2)">Save-Out
            </button>
            <button :disabled="form.busy" type="submit" class="btn  btn-primary" style="min-width:110px"
                    v-show="!editmode" @click="save_stay(3)">Save-New
            </button>
            <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                    v-show="editmode" @click="show_pdf()">Preview
            </button>
            <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                    v-show="editmode">Print
            </button>
          </div>
        </div>
      </div>
      <!--  Model  -->
      <div class="modal fade model-middle" id="chartOfModal" tabindex="-1" role="dialog"
           aria-labelledby="exampleModalLabel" z-index="1000" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="width:900px">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Custom field</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-holder">
                <table id="tbl_journal_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Main-Group</th>
                    <th>Sub-Group</th>
                    <th>Account No</th>
                    <th>Description</th>
                    <th>Govt Tax Code</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr style="cursor:pointer" v-for="(coa_data,index) in coa_arr"
                      @click.prevent="account_popup_close(coa_data)"
                  >
                    <td>{{ index + 1 }}</td>
                    <td>{{ coa_data.sub_group_name }}</td>
                    <td>{{ coa_data.account_title }}</td>
                    <td>{{ coa_data.account_no }}</td>
                    <td>{{ coa_data.description }}</td>
                    <td>{{ coa_data.govt_tax_code }}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="modelClose()">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Model end -->


      <!--  MOdel  -->
      <div class="modal fade model-middle" id="customAccountTypeModal" tabindex="-1" role="dialog"
           aria-labelledby="exampleModalLabel" z-index="1000" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Service Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-holder">
                <div class="row align-self-stretch">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-box-outer">
                      <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <label class="fieldlabels">Service Category Name</label>
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input v-model="form.custom_field_name"
                                 type="text"
                                 name="custom_field_name"
                                 :class="{ 'is-invalid': form.errors.has('custom_field_name') }"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="modelClose()">Close</button>
              <button type="button" class="btn btn-primary" @click.prevent="addNewCustomField(form.custom_tax_type)">Add
                Service Category
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- model end -->
    </form>
  </fieldset>
</template>

<style>

.table_narrow td {
  padding: .1rem .5rem !important;
}

.table_narrow th, .table_narrow .header td {
  font-size: 13px !important;
  vertical-align: middle !important;
  color: rgb(255, 255, 255) !important;
  text-align: center !important;
  border: 1px solid #fff !important;
}

.table_narrow tbody td {
  font-size: 13px !important;
}

.table_narrow thead tr, .table_narrow .header {
  background-color: rgb(0, 112, 192) !important;
}

.table_narrow input {

  font-size: 12px !important;
  height: 30px !important;
  margin: 5px 0 !important;
}

</style>

<script>
import { ref } from "vue";
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
      tempeditmode: false,
      show_company: true,
      list_showable: false,
      filter: '',
      form: new Form({
        system_no: '',
        asset_category: '',
        sub_category: '',
        asset_name: '',
        serial_no: '',
        uom: '',
        condition: '',
        barcode: '',
        model: '',
        color: '',
        comments: '',
        status_active: '',
        id: '',
        length_uom: '',
        item_length: '',
        width_uom: '',
        item_width: '',
        height_uom: '',
        item_height: '',
        account_type_arr: [],
        custom_field_name: '',
      }),

      columns: ref([
        {title: 'SL', field: 'sl', align: 'center'},
        {title: 'Service Code', field: 'system_no'},
        {title: 'Service Category', field: 'asset_category_string'},
        {title: 'Service Title', field: 'asset_name'},
        {title: 'Description', field: 'serial_no'},
        {title: 'Service Type', field: 'uom_string'},
        {title: 'Service Cost', field: 'barcode'},
        {title: 'Purchase Tax', field: 'model'},
        {title: 'Sales Tax', field: 'color'},
        {title: 'Action', field: 'buttons', sort: false},
      ]),
      rows: [],
      temp_account_type: "",
      coa_arr: [],
      uom_arr: [],
      sales_tax_arr: [],
      purchase_tax_arr: [],
      asset_category_arr: [],
      main_category_arr: [],
      sub_category_arr: [],
      page: 1,
      per_page: 15,
      expanded: null
    }
  },

  created: function () {
    this.user_menu_name = this.$route.name;
    this.fetchTaxProfile();
  },

  computed: {},
  methods: {
    change_asset_category() {
      this.form.sub_category = "";
      if (this.form.asset_category == "Add") {
        $("#customAccountTypeModal").modal('show');
        $('.modal.fade').addClass('modal fade show');
        $('modal-backdrop').addClass('modal-backdrop fade show');
      } else {
        return;
      }
    },

    addNewCustomField() {
      if (!this.form.custom_field_name) {
        toast({
          type: 'warning',
          title: 'Please Select Service Categroy Name'
        });
        return;
      }

      this.form.post('/AddServiceCategory').then(({data}) => {
        var response_data = data.split("**");
        if (response_data[0] == 1) {
          showToast('Custom Field Added Successfully', 'success');
          this.asset_category_arr[response_data[1]] = this.form.custom_field_name;
          this.form.custom_field_name = '';

          $("#exampleModal").modal("hide");
          $('.modal.in').modal('hide');
          $('.modal-backdrop').remove();

        } else {
          showToast('Invalid Operation', 'error');
        }
      });

    },
    add_account_type() {
      // this.form.custom_contact_type=index;
      $("#customAccountTypeModal").modal('show');
      $('.modal.fade').addClass('modal fade show');
      $('modal-backdrop').addClass('modal-backdrop fade show');
    },
    editFixedAsset(id) {
      this.form.reset();
      this.list_showable = false;
      let uri = '/FixedAssets/' + id + '/edit';
      window.axios.get(uri).then((response) => {

        this.editmode = true;

        this.main_category_arr = response.data.main_category;
        this.sub_category_arr = response.data.sub_category;
        this.coa_arr = response.data.coa_arr;
        this.uom_arr = response.data.unit_of_measurement;
        this.form.account_type_arr = response.data.account_type_arr;

        this.form.id = response.data.fixedAsset_data.id;
        this.form.asset_category = response.data.fixedAsset_data.asset_category;
        this.form.system_no = response.data.fixedAsset_data.system_no;
        this.form.asset_name = response.data.fixedAsset_data.asset_name;
        this.form.serial_no = response.data.fixedAsset_data.serial_no;
        this.form.uom = response.data.fixedAsset_data.uom;
        this.form.sub_category = response.data.fixedAsset_data.sub_category;
        this.form.condition = response.data.fixedAsset_data.condition;
        this.form.model = response.data.fixedAsset_data.model;
        this.form.color = response.data.fixedAsset_data.color;
        this.form.barcode = response.data.fixedAsset_data.barcode;
        this.form.comments = response.data.fixedAsset_data.comments;
        this.form.length_uom = response.data.fixedAsset_data.length_uom;
        this.form.status_active = response.data.fixedAsset_data.status_active;
        this.form.length_uom = response.data.fixedAsset_data.length_uom;
        this.form.item_length = response.data.fixedAsset_data.item_length;
        this.form.width_uom = response.data.fixedAsset_data.width_uom;
        this.form.item_width = response.data.fixedAsset_data.item_width;
        this.form.height_uom = response.data.fixedAsset_data.height_uom;
        this.form.item_height = response.data.fixedAsset_data.item_height;
      });
    },

    reset_form() {
      this.form.reset();
      this.editmode = false;
      this.list_showable = false;
      this.fetchTaxProfile();
    },

    reset_list() {
      this.form.reset();
      this.editmode = false;
      let uri = '/fixedAssetList';
      window.axios.get(uri).then((response) => {
        this.rows = ref(response.data.fixed_asset_list);
      });
      this.list_showable = true;
    },

    chart_of_account_popup(accountTypeId) {
      this.temp_account_type = accountTypeId;
      $("#chartOfModal").modal('show');
      $('.modal.fade').addClass('modal fade show');
      $('modal-backdrop').addClass('modal-backdrop fade show');
    },

    account_popup_close(coa) {
      this.form.account_type_arr[this.temp_account_type].chart_of_account = coa.account_no;
      this.form.account_type_arr[this.temp_account_type].chart_of_account_id = coa.id;

      $('.modal.in').modal('hide');
      $('.modal-backdrop').remove();
      this.temp_account_type = "";
    },

    fetchTaxProfile() {
      let uri = '/FixedAssets';
      window.axios.get(uri).then((response) => {
        this.main_category_arr = response.data.main_category;
        this.sub_category_arr = response.data.sub_category;
        this.coa_arr = response.data.coa_arr;
        this.uom_arr = response.data.unit_of_measurement;
        this.form.account_type_arr = response.data.account_type_arr;
      });
    },

    TaxDelete(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        this.form.delete('/FixedAssets/' + id).then(() => {
          if (result.value) {
            showAlert(
                'Deleted!',
                'Your Data has been deleted.',
                'success'
            );
            this.form.reset();
            this.reset_list();
          }

        }).catch(() => {
          showAlert("failed!", "there was some wrong", "warning");
        });

      })
    },

    deleteTax() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        this.form.delete('/FixedAssets/' + this.form.id).then(() => {
          if (result.value) {
            showAlert(
                'Deleted!',
                'Your Data has been deleted.',
                'success'
            );
            this.form.reset();
            this.fetchTaxProfile();
          }
        }).catch(() => {
          showAlert("failed!", "there was some wrong", "warning");
        });
      })
    },

    updateTax() {
      this.form.put('/FixedAssets/' + this.form.id).then(({data}) => {
        var response_data = data.split("**");
        if (response_data[0] == 1) {
          showToast('Data Update Successfully', 'success');
          this.editFixedAsset(response_data[1]);
          this.editmode = true;
        } else {
          showToast('Invalid Operation', 'error');
        }
      });
    },

    save_stay(type) {
      this.form.post('/FixedAssets').then(({data}) => {
        var response_data = data.split("**");
        if (response_data[0] == 1) {
          showToast('Data Save Successfully', 'success');

          if (type == 1) {
            this.editTax(response_data[1]);
            this.editmode = true;
          } else if (type == 2) {
            window.location.href = '/Dashboard';

          } else if (type == 3) {
            this.form.reset();
            this.fetchTaxProfile();
          }
        } else {
          showToast('Invalid Operation', 'error');
        }
      })
    },
  }
}
</script>