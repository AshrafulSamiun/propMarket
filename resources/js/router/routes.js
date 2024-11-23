import Hello from '../components/Temporary/Hello.vue'
import Building from '../components/Property/Building.vue';
import Floors from '../components/Property/Floor.vue';
import ResidentalSuites from '../components/Property/ResidentalSuite.vue';
import CommercialUnit from '../components/Property/CommericalUnit.vue';
import SupportingRoom from '../components/Property/SupportingRoom.vue';
import ParkingLot from '../components/Property/ParkingLot.vue';
import BikeLot from '../components/Property/BikeLot.vue';
import StorageLot from '../components/Property/StorageLot.vue';
import CommonArea from '../components/Property/CommonArea.vue';
import MailRoom from '../components/Property/MailRoom.vue';
import PropertyAttrebution from '../components/Property/PropertyAttrebution.vue';
import AccountPeriod from '../components/New/AccountPeriod.vue';
import NewPostingJobs from '../components/market_place/NewPostingJobs.vue';
import NewPostingJobshosing from '../components/market_place/NewPostingJobshosing.vue';
import Modules from '../components/Module.vue';
import Menus from '../components/menu.vue';
import OpenFile from '../components/OpenFiles.vue';

import Bank from '../components/Account_Holders/Bank.vue';
import BoardofDirector from '../components/Account_Holders/BoardofDirector.vue';
import Client from '../components/Account_Holders/Client.vue';
import CreditCardCompany from '../components/Account_Holders/CreditCardCompany.vue';
import Customer from '../components/Account_Holders/Customer.vue';
import Donor from '../components/Account_Holders/Donor.vue';
import Employee from '../components/Account_Holders/Employee.vue';
import Government from '../components/Account_Holders/Government.vue';
import Investor from '../components/Account_Holders/Investor.vue';
import Landlord from '../components/Account_Holders/Landlord.vue';
import Leaseholder from '../components/Account_Holders/Leaseholder.vue';
import PrivateLoanLender from '../components/Account_Holders/PrivateLoanLender.vue';
import ServiceProvider from '../components/Account_Holders/ServiceProvider.vue';
import Shareholder from '../components/Account_Holders/Shareholder.vue';
import Student from '../components/Account_Holders/Student.vue';
import Seller from '../components/Account_Holders/Seller.vue';
import Tenant from '../components/Account_Holders/Tenant.vue';
import Visitor from '../components/Account_Holders/Visitor.vue';
import Volunteer from '../components/Account_Holders/Volunteer.vue';

export const routes = [

    //============================Temp user============================================================================================
    { name: 'Temp-Management-Type',           path: '/Temp-Management-Type',          component: Hello },
    { name: 'Temp-CompanyProfile',            path: '/Temp-CompanyProfile',           component: Hello },
    { name: 'Temp-ContactsPersons',           path: '/Temp-ContactsPersons',          component: Hello },
    { name: 'Temp-ServicePlan',               path: '/Temp-ServicePlan',              component: Hello },
    { name: 'Temp-ServiceContract',           path: '/Temp-ServiceContract',          component: Hello },
    { name: 'Temp-TermsOfAgreement',          path: '/Temp-TermsOfAgreement',         component: Hello },
    { name: 'Temp-DocumentsSubmission',       path: '/Temp-DocumentsSubmission',      component: Hello },
    { name: 'Temp-ActivationStatus',          path: '/Temp-ActivationStatus',         component: Hello },

    // ============================New=============================================================================
    { name: 'Company-Profile',                path: '/Company-Profile',               component: Hello },
    { name: 'Customer-Property',              path: '/Customer-Property',             component: Hello },
    { name: 'Application-Form',               path: '/Application-Form',              component: Hello },
    { name: 'Customer-Seller',                path: '/Customer-Seller',               component: Hello },
    { name: 'Customer-Service',               path: '/Customer-Service',              component: Hello },
    { name: 'Rule-Policy',                    path: '/Rule-Policy',                   component: Hello },
    { name: 'Procudure-Instruction',          path: '/Procudure-Instruction',         component: Hello },
    { name: 'Account-Holder',                 path: '/Account-Holder',                component: Hello },
    { name: 'Coa-Setting',                    path: '/Coa-Setting',                   component: Hello },
    { name: 'Chart-Accounts',                 path: '/Chart-Accounts',                component: Hello },
    { name: 'Taxes',                          path: '/Taxes',                         component: Hello },
    { name: 'Service-Item',                   path: '/Service-Item',                  component: Hello },
    { name: 'Inventory-Item',                 path: '/Inventory-Item',                component: Hello },
    { name: 'Fixed-Asset',                    path: '/Fixed-Asset',                   component: Hello },
    { name: 'Project',                        path: '/Project',                       component: Hello },
    { name: 'Utilities',                      path: '/Utilities',                     component: Hello },

    //================================Property===========================================================================================================
    { name: 'Building',                       path: '/Building',                      component: Building },
    { name: 'Floors',                         path: '/Floors',                        component: Floors },
    { name: 'ResidentalSuites',               path: '/ResidentalSuites',              component: ResidentalSuites },
    { name: 'CommercialUnit',                 path: '/CommercialUnit',                component: CommercialUnit },
    { name: 'SupportingRoom',                 path: '/SupportingRoom',                component: SupportingRoom },
    { name: 'ParkingLot',                     path: '/ParkingLot',                    component: ParkingLot },
    { name: 'Bike-Lot',                       path: '/Bike-Lot',                      component: BikeLot },
    { name: 'Storage-Lot',                    path: '/Storage-Lot',                   component: StorageLot },
    { name: 'CommonArea',                     path: '/CommonArea',                    component: CommonArea },
    { name: 'Mail-Room',                      path: '/Mail-Room',                     component: MailRoom },
    { name: 'Property-Attrebution',           path: '/Property-Attrebution',          component: PropertyAttrebution },
    { name: 'NewPostingJobs',                 path: '/NewPostingJobs',                component: NewPostingJobs },
    { name: 'PostingHousingRental',           path: '/PostingHousingRental',          component: NewPostingJobshosing },
    { name: 'Modules',                        path: '/Modules',                       component: Modules },
    { name: 'Menus',                          path: '/Menus',                         component: Menus },
    { name: 'Open-File',                      path: '/Open-File',                     component: OpenFile },

    //=======================================Transaction=================================================================================
    { name: 'Purchase',                       path: '/Purchase',                      component: Hello },
    { name: 'Sales',                          path: '/Sales',                         component: Hello },
    { name: 'Forms',                          path: '/Forms',                         component: Hello },

    //============================Account Holder=========================================
    { name: 'Bank',                           path: '/Bank',                          component: Bank },
    { name: 'BoardofDirector',                path: '/BoardofDirector',               component: BoardofDirector },
    { name: 'Client',                         path: '/Client',                        component: Client },
    { name: 'CreditCardCompany',              path: '/CreditCardCompany',             component: CreditCardCompany },
    { name: 'Customer',                       path: '/Customer',                      component: Customer },
    { name: 'Donor',                          path: '/Donor',                         component: Donor },
    { name: 'Employee',                       path: '/Employee',                      component: Employee },
    { name: 'Government',                     path: '/Government',                    component: Government },
    { name: 'Investor',                       path: '/Investor',                      component: Investor },
    { name: 'Landlord',                       path: '/Landlord',                      component: Landlord },
    { name: 'Leaseholder',                    path: '/Leaseholder',                   component: Leaseholder },
    { name: 'PrivateLoanLender',              path: '/PrivateLoanLender',             component: PrivateLoanLender },
    { name: 'ServiceProvider',                path: '/ServiceProvider',               component: ServiceProvider},
    { name: 'Shareholder',                    path: '/Shareholder',                   component: Shareholder },
    { name: 'Student',                        path: '/Student',                       component: Student },
    { name: 'Seller',                         path: '/Seller',                        component: Seller },
    { name: 'Tenant',                         path: '/Tenant',                        component: Tenant },
    { name: 'Visitor',                        path: '/Visitor',                       component: Visitor },
    { name: 'Volunteer',                      path: '/Volunteer',                     component: Volunteer },
    //===========================Account Holder finish================================================

    { name: 'Users',                          path: '/Users',                         component: Hello },
    { name: 'User-Privilige',                 path: '/User-Privilige',                component: Hello },
    { name: 'User-Info',                      path: '/User-Info',                     component: Hello },
    { name: 'Company-Info',                   path: '/Company-Info',                  component: Hello },
    { name: 'Countries',                      path: '/Countries',                     component: Hello },
    { name: 'Proviences',                     path: '/Proviences',                    component: Hello },
    { name: 'ServicePlans',                   path: '/ServicePlans',                  component: Hello },
    { name: 'Account-Floor',                  path: '/Account-Floor',                 component: Hello },
    { name: 'Account-Suites',                 path: '/Account-Suites',                component: Hello },
    { name: 'Account-Maintenance-Room',       path: '/Account-Maintenance-Room',      component: Hello },
    { name: 'Account-Parking',                path: '/Account-Parking',               component: Hello },
    { name: 'Account-Lockers',                path: '/Account-Lockers',               component: Hello },
    { name: 'FireExtinguisher-Locations',     path: '/FireExtinguisher-Locations',    component: Hello },
    { name: 'TowerInspection-Checklist',      path: '/TowerInspection-Checklist',     component: Hello },
    { name: 'Account-Sprinkler',              path: '/Account-Sprinkler',             component: Hello },
    { name: 'Account-Breakers',               path: '/Account-Breakers',              component: Hello },
    { name: 'Account-EmergencyExits',         path: '/Account-EmergencyExits',        component: Hello },
    { name: 'EmergencyWater-ShutDown',        path: '/EmergencyWater-ShutDown',       component: Hello },
    { name: 'Account-ServicesContractors',    path: '/Account-ServicesContractors',   component: Hello },
    { name: 'Account-FirePanel',              path: '/Account-FirePanel',             component: Hello },
    { name: 'Account-GymEquipments',          path: '/Account-GymEquipments',         component: Hello },
    { name: 'Account-SwimmingPool ',          path: '/Account-SwimmingPool ',         component: Hello },
    { name: 'Account-Compactor ',             path: '/Account-Compactor ',            component: Hello },
    { name: 'Account-Elevator',               path: '/Account-Elevator',              component: Hello },
    { name: 'Account-AED',                    path: '/Account-AED',                   component: Hello },
    { name: 'Account-SecurityCamera ',        path: '/Account-SecurityCamera ',       component: Hello },
    { name: 'Account-FOB',                    path: '/Account-FOB',                   component: Hello },
    { name: 'Account-ScheduledInspection',    path: '/Account-ScheduledInspection',   component: Hello },
    { name: 'Account-ScheduledServices',      path: '/Account-ScheduledServices',     component: Hello },
    { name: 'Account-SafeBox',                path: '/Account-SafeBox',               component: Hello },
    { name: 'Account-PhoneCable',             path: '/Account-PhoneCable',            component: Hello },
    { name: 'General-Info',                   path: '/General-Info',                  component: Hello },
    { name: 'Account-period',                 path: '/Account-period',                component: AccountPeriod }
];