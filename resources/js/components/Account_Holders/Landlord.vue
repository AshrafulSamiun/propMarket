<template>
  <div class="card">
    <form id="msform" @submit.prevent="editmode ? updateAccountHolder() : createAccountHolder()"
          @keydown="form.onKeydown($event)">
      <fieldset>
        <div id="content">
          <div class="form-card">
            <h1 class="page-head">Landlord Profile</h1>
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
          </div>
          <div v-if="list_showable" class="form-card">
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
              <template #account_type_string="data">
                <span class="font-semibold">{{ data.value.account_type_string }}</span>
              </template>
              <template #landlord_name="data">
                <span class="font-semibold">{{ data.value.landlord_name }}</span>
              </template>
              <template #company_name="data">
                <span class="font-semibold">{{ data.value.company_name }}</span>
              </template>
              <template #landlord_email="data">
                <span class="font-semibold">{{ data.value.landlord_email }}</span>
              </template>
              <template #landlord_cell_phone="data">
                <span class="font-semibold">{{ data.value.landlord_cell_phone }}</span>
              </template>
              <template #landlord_country="data">
                <span class="font-semibold">{{ data.value.landlord_country }}</span>
              </template>
              <template #industry_sector="data">
                <span class="font-semibold">{{ data.value.industry_sector }}</span>
              </template>
              <template #buttons="data">
                <button class="btn btn-primary btn-sm" @click.prevent="editAccountHolder(data.value.id)">Edit</button>
                <button class="btn btn-danger btn-sm" @click.prevent="deleteAccountHolder(data.value.id)">Delete</button>
              </template>
            </vue3-datatable>
          </div>
          <div class="form-card" v-if="!list_showable">
            <div class="form-folder">
              <h3><i class="fa fa-hand-point-right"></i>Landlord Information:</h3>
              <div class="form-holder">
                <div class="row align-self-stretch">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-box-outer">
                      <label class="fieldlabels">ID No:</label>
                      <input type="text"
                             id="system_no"
                             name="system_no"
                             v-model="form.system_no"
                             placeholder="ID No" disabled/>
                      <label class="fieldlabels">Account Type:</label>
                      <div class="position-relative form-group">
                        <select v-model="form.account_type"
                                name="account_type"
                                class="custom-select"
                                :class="{ 'is-invalid': form.errors.has('account_type') }" disabled>
                          <option disabled value="">--Select--</option>
                          <option v-for="(account_holder, index) in account_holder_arr" :value="index">
                            {{ account_holder }}
                          </option>
                        </select>
                      </div>
                      <h4>Personal Information</h4>
                      <label class="fieldlabels">Title:</label>
                      <input
                          v-model="form.account_holder_title_name"
                          type="text"
                          name="account_holder_title_name"
                          placeholder="Type Title"
                          :class="{ 'is-invalid': form.errors.has('account_holder_title_name') }"/>

                      <label class="fieldlabels">Landlord Name:</label>
                      <input
                          v-model="form.landlord_name"
                          type="text"
                          name="landlord_name"
                          placeholder="Type landlord Name"
                          :class="{ 'is-invalid': form.errors.has('landlord_name') }"/>

                      <label class="fieldlabels">Landlord Photo:</label>
                      <input
                          v-model="form.landlord_photo"
                          type="text"
                          name="landlord_photo"
                          placeholder="Type Photo"
                          :class="{ 'is-invalid': form.errors.has('landlord_photo') }"/>

                      <h4>Landlord Contact</h4>
                      <label class="fieldlabels">Office Phone:</label>
                      <input v-model="form.landlord_office_phone"
                             type="text"
                             name="landlord_office_phone"
                             :class="{ 'is-invalid': form.errors.has('landlord_office_phone') }"/>

                      <label class="fieldlabels">Moblile Number:</label>
                      <input v-model="form.landlord_cell_phone"
                             type="text"
                             name="landlord_cell_phone"
                             :class="{ 'is-invalid': form.errors.has('landlord_cell_phone') }"/>
                      <label class="fieldlabels">Email:</label>
                      <input v-model="form.landlord_email"
                             type="landlord_email"
                             name="landlord_email"
                             :class="{ 'is-invalid': form.errors.has('landlord_email') }"/>

                      <label class="fieldlabels">Fax:</label>
                      <input v-model="form.landlord_fax_no"
                             type="text"
                             name="landlord_fax_no"
                             :class="{ 'is-invalid': form.errors.has('landlord_fax_no') }"/>

                      <label class="fieldlabels">Website :</label>
                      <input v-model="form.landlord_website"
                             type="url"
                             name="landlord_website"
                             :class="{ 'is-invalid': form.errors.has('landlord_website') }"/>

                      <h4>Landlord Address</h4>
                      <label class="fieldlabels"> House Number:</label>
                      <input v-model="form.landlord_house_number"
                             type="phone"
                             name="landlord_house_number"
                             placeholder="Type  House/Office Number"
                             :class="{ 'is-invalid': form.errors.has('landlord_house_number') }"/>

                      <label class="fieldlabels"> Street Number:</label>
                      <input v-model="form.landlord_street_number"
                             type="text"
                             name="landlord_street_number"
                             placeholder="Type  Street Number"
                             :class="{ 'is-invalid': form.errors.has('landlord_street_number') }"/>

                      <label class="fieldlabels"> City:</label>
                      <input v-model="form.landlord_city"
                             type="text"
                             name="landlord_city"
                             placeholder="Type  City"
                             :class="{ 'is-invalid': form.errors.has('landlord_city') }"/>

                      <label class="fieldlabels"> State:</label>
                      <input v-model="form.landlord_state"
                             type="text"
                             name="landlord_state"
                             placeholder="Type  State"
                             :class="{ 'is-invalid': form.errors.has('landlord_state') }"/>

                      <label class="fieldlabels">Country:</label>
                      <div class="position-relative form-group">
                        <select v-model="form.landlord_country"
                                name="landlord_country"
                                class="custom-select"
                                :class="{ 'is-invalid': form.errors.has('landlord_country') }">
                          <option disabled value="">--Select--</option>
                          <option v-for="(country,index) in countries" :value="index">{{ country }}</option>
                        </select>
                      </div>

                      <label class="fieldlabels"> Zip Code/ Postal Code:</label>
                      <input v-model="form.landlord_zip_code"
                             type="phone"
                             name="zip_code"
                             placeholder="Type Zip Code/ Postal Code"
                             :class="{ 'is-invalid': form.errors.has('landlord_zip_code') }"/>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-box-outer">
                      <h4>Company Information</h4>
                      <label class="fieldlabels">Company Name:</label>
                      <input v-model="form.company_name"
                             type="text"
                             placeholder="Type Company Name"
                             name="company_name"
                             :class="{ 'is-invalid': form.errors.has('company_name') }"/>

                      <label class="fieldlabels">Company Logo:</label>
                      <input
                          v-model="form.company_logo"
                          type="text"
                          name="company_logo"
                          placeholder="Type Company Logo"
                          :class="{ 'is-invalid': form.errors.has('company_logo') }"/>

                      <label class="fieldlabels">Industry Sector:</label>
                      <div class="position-relative form-group">
                        <select v-model="form.industry_sector"
                                name="industry_sector"
                                class="custom-select"
                                :class="{ 'is-invalid': form.errors.has('industry_sector') }">
                          <option disabled value="">--Select--</option>
                          <option v-for="(industry_sector,index) in industry_sector_arr" :value="index">
                            {{ industry_sector }}
                          </option>
                          <option value="add">Other ( Please specify )</option>
                        </select>
                      </div>

                      <h4>Company Address</h4>
                      <label class="fieldlabels"> House Number:</label>
                      <input v-model="form.company_house_number"
                             type="phone"
                             name="company_house_number"
                             placeholder="Type  House/Office Number"
                             :class="{ 'is-invalid': form.errors.has('company_house_number') }"/>

                      <label class="fieldlabels"> Street Number:</label>
                      <input v-model="form.company_street_number"
                             type="text"
                             name="company_street_number"
                             placeholder="Type  Street Number"
                             :class="{ 'is-invalid': form.errors.has('company_street_number') }"/>

                      <label class="fieldlabels"> City:</label>
                      <input v-model="form.company_city"
                             type="text"
                             name="company_city"
                             placeholder="Type  City"
                             :class="{ 'is-invalid': form.errors.has('company_city') }"/>

                      <label class="fieldlabels"> State:</label>
                      <input v-model="form.company_state"
                             type="text"
                             name="company_state"
                             placeholder="Type  State"
                             :class="{ 'is-invalid': form.errors.has('company_state') }"/>

                      <label class="fieldlabels"> Country:</label>
                      <div class="position-relative form-group">
                        <select v-model="form.company_country"
                                name="company_country"
                                class="custom-select"
                                :class="{ 'is-invalid': form.errors.has('company_country') }">
                          <option disabled value="">--Select--</option>
                          <option v-for="(country,index) in countries" :value="index">{{ country }}</option>
                        </select>
                      </div>
                      <label class="fieldlabels"> Zip Code/ Postal Code:</label>
                      <input v-model="form.company_zip_code"
                             type="phone"
                             name="zip_code"
                             placeholder="Type Zip Code/ Postal Code"
                             :class="{ 'is-invalid': form.errors.has('company_zip_code') }"/>

                      <h4>Company Contact</h4>

                      <label class="fieldlabels">Office Phone:</label>
                      <input v-model="form.company_office_phone"
                             type="text"
                             name="company_office_phone"
                             :class="{ 'is-invalid': form.errors.has('company_office_phone') }"/>

                      <label class="fieldlabels">Moblile Number:</label>
                      <input v-model="form.company_cell_phone"
                             type="text"
                             name="company_cell_phone"
                             :class="{ 'is-invalid': form.errors.has('company_cell_phone') }"/>
                      <label class="fieldlabels">Email:</label>
                      <input v-model="form.company_email"
                             type="company_email"
                             name="company_email"
                             :class="{ 'is-invalid': form.errors.has('company_email') }"/>

                      <label class="fieldlabels">Fax:</label>
                      <input v-model="form.company_fax_no"
                             type="text"
                             name="company_fax_no"
                             :class="{ 'is-invalid': form.errors.has('company_fax_no') }"/>

                      <label class="fieldlabels">Website :</label>
                      <input v-model="form.company_website"
                             type="url"
                             name="company_website"
                             :class="{ 'is-invalid': form.errors.has('company_website') }"/>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-box-outer">
                      <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <label class="fieldlabels">Payment Method:</label>
                          <div class="position-relative form-group">
                            <select v-model="form.payment_method"
                                    name="payment_method"
                                    class="custom-select"
                                    :class="{ 'is-invalid': form.errors.has('payment_method') }">
                              <option disabled value="">--Select--</option>
                              <option v-for="(payment_method, index) in payment_class" :value="index">
                                {{ payment_method }}
                              </option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <label class="fieldlabels">Invoice Term:</label>
                          <input v-model="form.invoice_term"
                                 type="text"
                                 name="invoice_term"
                                 placeholder="Type Invoice Term"
                                 :class="{ 'is-invalid': form.errors.has('invoice_term') }"/>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <label class="fieldlabels">Credit Limit :</label>
                          <input v-model="form.credit_limit"
                                 type="number"
                                 placeholder="Type Credit Limit"
                                 name="credit_limit"
                                 :class="{ 'is-invalid': form.errors.has('credit_limit') }"/>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <label class="fieldlabels">Chart of Accounts:</label>
                          <input v-model="form.chart_of_acocounts"
                                 type="text"
                                 name="chart_of_acocounts"
                                 placeholder="Type Chart of Accounts"
                                 :class="{ 'is-invalid': form.errors.has('chart_of_acocounts') }"/>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="fieldlabels">Account Creation Date:</label>
                          <date-picker
                              style="width:100%"
                              v-model="form.account_creation_date"
                              name="account_creation_date"
                              type="account_creation_date"
                              :class="{ 'is-invalid': form.errors.has('account_creation_date') }"
                          />
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="fieldlabels">Account Status:</label>
                          <div class="position-relative form-group">
                            <select v-model="form.acount_status"
                                    name="acount_status"
                                    class="custom-select"
                                    :class="{ 'is-invalid': form.errors.has('acount_status') }">
                              <option disabled value="">--Select--</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="fieldlabels">Is this Account Holder has a portal ?:</label>
                          <div class="position-relative form-group">
                            <select v-model="form.account_holder_portal"
                                    name="account_holder_portal"
                                    class="custom-select"
                                    :class="{ 'is-invalid': form.errors.has('account_holder_portal') }">
                              <option disabled value="">--Select--</option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="fieldlabels">Is this Account Holder has a dedicated File ?:</label>
                          <div class="position-relative form-group">
                            <select v-model="form.account_holder_dedicated_file"
                                    name="account_holder_dedicated_file"
                                    class="custom-select"
                                    :class="{ 'is-invalid': form.errors.has('account_holder_dedicated_file') }">
                              <option disabled value="">--Select--</option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="fieldlabels">Comment :</label>
                          <input v-model="form.comments"
                                 type="text"
                                 name="comments"
                                 placeholder="Type Comment"
                                 :class="{ 'is-invalid': form.errors.has('comments') }"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-folder">
                <h3><i class="fa fa-hand-point-right"></i>Property Management:
                  <button type="button" class="btn btn-primary btn-sm" @click="show_hide_property_management_license()"
                          v-show="!property_management_show">Show
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" @click="show_hide_property_management_license()"
                          v-show="property_management_show">Hide
                  </button>
                </h3>
                <div class="form-holder" v-show="property_management_show">
                  <div class="row align-self-stretch">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="form-box-outer">
                        <div class="form-holder">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Company name:</label>
                            <input v-model="form.property_management_company_name"
                                   type="text"
                                   name="property_management_company_name"
                                   placeholder="Type Company Name"
                                   :class="{ 'is-invalid': form.errors.has('property_management_company_name') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Property Manager Name :</label>
                            <input v-model="form.property_management_manager_name"
                                   type="text"
                                   placeholder="Type Property Manager Name"
                                   name="property_management_manager_name"
                                   :class="{ 'is-invalid': form.errors.has('property_management_manager_name') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Logo :</label>
                            <input v-model="form.property_management_logo"
                                   type="text"
                                   placeholder="Type Logo"
                                   name="property_management_logo"
                                   :class="{ 'is-invalid': form.errors.has('property_management_logo') }"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <div class="form-box-outer">
                        <div class="row">
                          <h4>Address</h4>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Number:</label>
                            <input v-model="form.property_management_house_number"
                                   type="phone"
                                   name="property_management_house_number"
                                   placeholder="Type House/Office Number"
                                   :class="{ 'is-invalid': form.errors.has('property_management_house_number') }"/>
                          </div>
                          <div class="col-md-12 col-sm-6 col-xs-12">
                            <label class="fieldlabels">Street Number:</label>
                            <input v-model="form.property_management_street_number"
                                   type="text"
                                   name="property_management_street_number"
                                   placeholder="Type Street Number"
                                   :class="{ 'is-invalid': form.errors.has('property_management_street_number') }"/>
                          </div>

                          <div class="col-md-12 col-sm-6 col-xs-12">
                            <label class="fieldlabels">City:</label>
                            <input v-model="form.property_management_city"
                                   type="text"
                                   name="property_management_city"
                                   placeholder="Type City"
                                   :class="{ 'is-invalid': form.errors.has('property_management_city') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">State:</label>
                            <input v-model="form.property_management_state"
                                   type="text"
                                   name="property_management_state"
                                   placeholder="Type State"
                                   :class="{ 'is-invalid': form.errors.has('property_management_state') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Country:</label>
                            <div class="position-relative form-group">
                              <select v-model="form.property_management_country"
                                      name="property_management_country"
                                      class="custom-select"
                                      :class="{ 'is-invalid': form.errors.has('property_management_country') }">
                                <option disabled value="">--Select--</option>
                                <option v-for="(country,index) in countries" :value="index">{{ country }}</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Zip Code/ Postal Code:</label>
                            <input v-model="form.property_management_zip_code"
                                   type="phone"
                                   name="property_management_zip_code"
                                   placeholder="Type Zip Code/ Postal Code"
                                   :class="{ 'is-invalid': form.errors.has('property_management_zip_code') }"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <div class="form-box-outer">
                        <h4>Contact</h4>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Email:</label>
                            <input v-model="form.property_management_email"
                                   type="email"
                                   name="property_management_email"
                                   :class="{ 'is-invalid': form.errors.has('property_management_email') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Fax:</label>
                            <input v-model="form.property_management_fax_no"
                                   type="text"
                                   name="property_management_fax_no"
                                   :class="{ 'is-invalid': form.errors.has('property_management_fax_no') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Moblile Number:</label>
                            <input v-model="form.property_management_cell_phone"
                                   type="text"
                                   name="property_management_cell_phone"
                                   :class="{ 'is-invalid': form.errors.has('property_management_cell_phone') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Office Phone:</label>
                            <input v-model="form.property_management_office_phone"
                                   type="text"
                                   name="property_management_office_phone"
                                   :class="{ 'is-invalid': form.errors.has('property_management_office_phone') }"/>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="fieldlabels">Website :</label>
                            <input v-model="form.property_management_website"
                                   type="url"
                                   name="property_management_website"
                                   :class="{ 'is-invalid': form.errors.has('property_management_website') }"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                      @click="reset_form()">New
              </button>
              <button :disabled="form.busy" type="submit" class="btn  btn-primary" style="min-width:110px"
                      v-show="editmode">Edit
              </button>
              <button :disabled="form.busy" type="button" class="btn  btn-primary" style="min-width:110px"
                      v-show="editmode" @click.prevent="deleteAccountHolder()">Delete
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
      </fieldset>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import Vue3Datatable from "@bhplugin/vue3-datatable";
import "@bhplugin/vue3-datatable/dist/style.css";

import DatePicker from 'vue3-datepicker';

export default {
  name: 'list-product-categories',
  components: {
    Vue3Datatable,
    DatePicker
  },
  data() {
    return {
      editmode: false,
      filter: '',
      list_showable: false,
      form: new Form({
        account_type: 4,
        landlord_name: '',
        landlord_photo: '',
        landlord_office_phone: '',
        landlord_cell_phone: '',
        landlord_email: '',
        landlord_fax_no: '',
        landlord_website: '',
        landlord_house_number: '',
        landlord_street_number: '',
        landlord_city: '',
        landlord_state: '',
        landlord_country: '',
        landlord_zip_code: '',
        company_name: '',
        company_logo: '',
        industry_sector: '',
        company_house_number: '',
        company_street_number: '',
        company_city: '',
        company_state: '',
        company_country: '',
        company_zip_code: '',
        company_office_phone: '',
        company_cell_phone: '',
        company_email: '',
        company_fax_no: '',
        company_website: '',
        payment_method: '',
        invoice_term: '',
        credit_limit: '',
        chart_of_acocounts: '',
        account_creation_date: null,
        acount_status: '',
        comments: '',
        id: '',
        account_holder_portal: '',
        account_holder_dedicated_file: '',
        account_holder_title_name: '',
        property_management_name: '',
        property_management_logo: '',
        property_management_manager_name: '',
        property_management_house_number: '',
        property_management_street_number: '',
        property_management_city: '',
        property_management_state: '',
        property_management_country: '',
        property_management_zip_code: '',
        property_management_email: '',
        property_management_fax_no: '',
        property_management_cell_phone: '',
        property_management_office_phone: '',
        property_management_website: '',
      }),
      main_company_arr: [],
      industry_sector_arr: [],
      industry_sector_display: false,
      account_holder_arr: [],
      payment_name: [],
      payment_class: [],
      countries: '',
      business_license_show: false,
      property_management_show: false,
      liability_insurence_show: false,

      columns: ref([
        {title: 'SL', field: 'sl', align: 'center'},
        {title: 'System No', field: 'system_no'},
        {title: 'Account Type', field: 'account_type_string'},
        {title: 'Landlord Name', field: 'landlord_name'},
        {title: 'Company Name', field: 'company_name'},
        {title: 'Email', field: 'landlord_email'},
        {title: 'Mobile No', field: 'landlord_cell_phone'},
        {title: 'Country', field: 'landlord_country'},
        {title: 'Industrial Sector', field: 'industry_sector'},
        {title: 'Action', field: 'buttons', sort: false},
      ]),
      rows: [],
      page: 1,
      per_page: 15,
      expanded: null
    }
  },

  created: function () {
    this.user_menu_name = this.$route.name;
    this.fetchAccountHolder();
  },

  methods: {

    submitForm() {
      axios.put('/AccountHolderLandlord/' + this.recordId, this.form)
          .then(response => {
            console.log('Update successful');
          })
          .catch(error => {
            if (error.response && error.response.status === 422) {
              this.form.errors.record(error.response.data.errors);
            }
          });
    },

    show_hide_property_management_license() {
      if (this.property_management_show) {
        this.property_management_show = false;
      } else {
        this.property_management_show = true;
      }
    },


    reset_form() {

      this.form.reset();
      this.editmode = false;
      this.list_showable = false;
      this.fetchAccountHolder();

    },
    reset_list() {
      this.form.reset();
      this.editmode = false;
      let uri = '/AccountHolderLandlordLists';
      window.axios.get(uri).then((response) => {
        this.rows = ref(response.data.account_holder_list);
      });
      this.list_showable = true;
    },

    fetchAccountHolder() {
      let uri = '/AccountHolderLandlord';
      window.axios.get(uri).then((response) => {

        this.industry_sector_arr = response.data.industry_sector_arr;
        this.countries = response.data.country_arr;
        this.account_holder_arr = response.data.account_holder_arr;
        this.payment_name = response.data.payment_name;
        this.payment_class = response.data.payment_class;
        this.editmode = false;
      });
    },

    updateAccountHolder() {

      this.form.put('/AccountHolderLandlord/' + this.form.id).then(({data}) => {
        var response_data = data.split("**");
        //alert(response_data[0])
        if (response_data[0] * 1 == 1) {
          showToast('Data Update Successfully', 'success');

          this.editAccountHolder(response_data[1]);
          this.editmode = true;

        } else if (response_data[0] * 1 == 10) {
          showToast("Please open the 'Open File' page and select a company before proceeding to create an account holder User.", 'error');
        } else {
          showToast('Invalid Operation', 'error');
        }
      })
      .catch(() => {
        showAlert("failed!", "there was some wrong", "warning");

      });
    },

    createAccountHolder() {

      this.form.post('/AccountHolderLandlord').then(({data}) => {

        showToast('Data Save Successfully', 'success');

        this.form.reset();
        this.fetchAccountHolder();
      })
    },


    save_stay(type) {

      this.form.post('/AccountHolderLandlord').then(({data}) => {
        var response_data = data.split("**");
        if (response_data[0] == 1) {
          showToast('Data Save Successfully', 'success');

          if (type == 1) {
            this.fetchAccountHolderUpdate(response_data[1]);
            this.editmode = true;
          } else if (type == 2) {
            window.location.href = '/Dashboard';

          } else if (type == 3) {
            this.form.reset();
            this.fetchAccountHolder();
          }
        } else if (response_data[0] * 1 == 10) {
          showToast("Please open the 'Open File' page and select a company before proceeding to create an account holder User.", 'error');
        } else {
          showToast('Invalid Operation', 'error');
        }
      })
    },
    deleteAccountHolder() {

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {

        this.form.delete('/AccountHolderLandlord/' + this.form.id).then(() => {

          if (result.value) {
            showAlert(
                'Deleted!',
                'Your Company has been deleted.',
                'success'
            );
            this.form.reset();
            this.fetchAccountHolder();
          }

        }).catch(() => {
          showAlert("failed!", "there was some wrong", "warning");
        });
      })
    },
    editAccountHolder(id) {
      this.form.reset();
      this.list_showable = false;
      let uri = '/AccountHolderLandlord/' + id + '/edit';
      window.axios.get(uri).then((response) => {

        this.form.id = response.data.account_holder.id;
        this.form.system_no = response.data.account_holder.system_no;
        this.form.account_type = response.data.account_holder.account_type;
        this.form.landlord_name = response.data.account_holder.landlord_name;
        this.form.landlord_photo = response.data.account_holder.landlord_photo;

        this.form.landlord_office_phone = response.data.account_holder.landlord_office_phone;
        this.form.landlord_cell_phone = response.data.account_holder.landlord_cell_phone;
        this.form.landlord_state = response.data.account_holder.landlord_state;
        this.form.landlord_email = response.data.account_holder.landlord_email;
        this.form.landlord_fax_no = response.data.account_holder.landlord_fax_no;
        this.form.landlord_website = response.data.account_holder.landlord_website;

        this.form.landlord_house_number = response.data.account_holder.landlord_house_number;
        this.form.landlord_street_number = response.data.account_holder.landlord_street_number;
        this.form.landlord_city = response.data.account_holder.landlord_city;
        this.form.landlord_state = response.data.account_holder.landlord_state;
        this.form.landlord_country = response.data.account_holder.landlord_country;
        this.form.landlord_zip_code = response.data.account_holder.landlord_zip_code;

        this.form.company_office_phone = response.data.account_holder.company_office_phone;
        this.form.company_cell_phone = response.data.account_holder.company_cell_phone;
        this.form.company_state = response.data.account_holder.company_state;
        this.form.company_email = response.data.account_holder.company_email;
        this.form.company_fax_no = response.data.account_holder.company_fax_no;
        this.form.company_website = response.data.account_holder.company_website;

        this.form.company_house_number = response.data.account_holder.company_house_number;
        this.form.company_street_number = response.data.account_holder.company_street_number;
        this.form.company_city = response.data.account_holder.company_city;
        this.form.company_state = response.data.account_holder.company_state;
        this.form.company_country = response.data.account_holder.company_country;
        this.form.company_zip_code = response.data.account_holder.company_zip_code;
        this.form.company_name = response.data.account_holder.company_name;
        this.form.company_logo = response.data.account_holder.company_logo;
        this.form.industry_sector = response.data.account_holder.industry_sector;
        this.form.payment_method = response.data.account_holder.payment_method;
        this.form.invoice_term = response.data.account_holder.invoice_term;
        this.form.credit_limit = response.data.account_holder.credit_limit;
        this.form.chart_of_acocounts = response.data.account_holder.chart_of_acocounts;
        this.form.account_creation_date = response.data.account_holder.account_creation_date && response.data.account_holder.account_creation_date !== "" ?
            new Date(response.data.account_holder.account_creation_date) : null;
        this.form.acount_status = response.data.account_holder.acount_status;
        this.form.comments = response.data.account_holder.comments;
        this.form.property_management_name = response.data.account_holder.property_management_name;
        this.form.property_management_logo = response.data.account_holder.property_management_logo;
        this.form.property_management_manager_name = response.data.account_holder.property_management_manager_name;
        this.form.property_management_company_name = response.data.account_holder.property_management_company_name;
        this.form.property_management_house_number = response.data.account_holder.property_management_house_number;
        this.form.property_management_street_number = response.data.account_holder.property_management_street_number;
        this.form.property_management_city = response.data.account_holder.property_management_city;
        this.form.property_management_state = response.data.account_holder.property_management_state;
        this.form.property_management_country = response.data.account_holder.property_management_country;
        this.form.property_management_zip_code = response.data.account_holder.property_management_zip_code;
        this.form.property_management_email = response.data.account_holder.property_management_email;
        this.form.property_management_fax_no = response.data.account_holder.property_management_fax_no;
        this.form.property_management_cell_phone = response.data.account_holder.property_management_cell_phone;
        this.form.property_management_office_phone = response.data.account_holder.property_management_office_phone;
        this.form.property_management_website = response.data.account_holder.property_management_website;
        this.form.account_holder_portal = response.data.account_holder.account_holder_portal;
        this.form.account_holder_dedicated_file = response.data.account_holder.account_holder_dedicated_file;
        this.form.account_holder_title_name = response.data.account_holder.account_holder_title_name;

        this.industry_sector_arr = response.data.industry_sector_arr;
        this.countries = response.data.country_arr;
        this.account_holder_arr = response.data.account_holder_arr;
        this.editmode = true;
      });
    },
  }
}
</script>



