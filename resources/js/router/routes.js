import ManagementType from '../components/Temporary/Management-Type.vue';
import TaxCompanyProfile from '../components/Temporary/Company-Profile.vue';
import ContactPerson from '../components/Temporary/Contact-Person.vue';
import ServicePlan from '../components/Temporary/Service-Plan.vue';
import ServiceContact from '../components/Temporary/Service-Contact.vue';
import TermCondition from '../components/Temporary/Term-Condition.vue';
import DocumentSubmission from '../components/Temporary/Document-Submition.vue';
import ActivationStatus from '../components/Temporary/Activation-Status.vue';

import OpenFile from '../components/OpenFiles.vue';
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
import NewPostingJobs from '../components/market_place/NewPostingJobs.vue';
import NewPostingJobshosing from '../components/market_place/NewPostingJobshosing.vue';
import Modules from '../components/Module.vue';
import Menus from '../components/menu.vue';

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

import AccountPeriod from '../components/New/AccountPeriod.vue';
import CoaSetting from '../components/New/CoaSetting.vue';
import ChartAccounts from '../components/New/Coa.vue';
import ServiceItem from '../components/New/ServiceItems.vue';
import InventoryItem from '../components/New/InventoryItems.vue';
import FixedAsset from '../components/New/FixedAsset.vue';
import Project from '../components/New/Project.vue';
import CompanyProfile from '../components/New/Company-Profile.vue';
import RulePolicy from '../components/New/Rule-Policy.vue';
import ProcedureInstruction from '../components/New/Procudure-Instruction.vue';
import Utilities from '../components/New/Utilities.vue';

import Purchase from '../components/Operating_Module/Purchase.vue';
import Sales from '../components/Operating_Module/Sales.vue';

import Users from '../components/User.vue';
import UserPrivilige from '../components/UserPrivilige.vue';
import UserProfile from '../components/UserProfile.vue';
import CompanyInfo from '../components/Account_Setup/CompanyInfo.vue';
import Countries from '../components/Setting/Coutry.vue';
import Proviences from '../components/Setting/Provience.vue';
import ServicePlans from '../components/Setting/ServicePlan.vue';

export const routes = [
    //============================Temp user============================================================================================
    { name: 'Temp-Management-Type',           path: '/Temp-Management-Type',          component: ManagementType },
    { name: 'Temp-CompanyProfile',            path: '/Temp-CompanyProfile',           component: TaxCompanyProfile },
    { name: 'Temp-ContactsPersons',           path: '/Temp-ContactsPersons',          component: ContactPerson },
    { name: 'Temp-ServicePlan',               path: '/Temp-ServicePlan',              component: ServicePlan },
    { name: 'Temp-ServiceContract',           path: '/Temp-ServiceContract',          component: ServiceContact },
    { name: 'Temp-TermsOfAgreement',          path: '/Temp-TermsOfAgreement',         component: TermCondition },
    { name: 'Temp-DocumentsSubmission',       path: '/Temp-DocumentsSubmission',      component: DocumentSubmission },
    { name: 'Temp-ActivationStatus',          path: '/Temp-ActivationStatus',         component: ActivationStatus },

    // ============================New=============================================================================
    { name: 'Account-period',                 path: '/Account-period',                component: AccountPeriod },
    { name: 'Coa-Setting',                    path: '/Coa-Setting',                   component: CoaSetting },
    { name: 'Chart-Accounts',                 path: '/Chart-Accounts',                component: ChartAccounts },
    { name: 'Inventory-Item',                 path: '/Inventory-Item',                component: InventoryItem },
    { name: 'Service-Item',                   path: '/Service-Item',                  component: ServiceItem },
    { name: 'Fixed-Asset',                    path: '/Fixed-Asset',                   component: FixedAsset },
    { name: 'Project',                        path: '/Project',                       component: Project },
    { name: 'Company-Profile',                path: '/Company-Profile',               component: CompanyProfile },
    { name: 'Rule-Policy',                    path: '/Rule-Policy',                   component: RulePolicy },
    { name: 'Procudure-Instruction',          path: '/Procudure-Instruction',         component: ProcedureInstruction },
    { name: 'Utilities',                      path: '/Utilities',                     component: Utilities },

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
    { name: 'Purchase',                       path: '/Purchase',                      component: Purchase },
    { name: 'Sales',                          path: '/Sales',                         component: Sales },

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

    { name: 'Users',                          path: '/Users',                         component: Users },
    { name: 'User-Privilige',                 path: '/User-Privilige',                component: UserPrivilige },
    { name: 'User-Info',                      path: '/User-Info',                     component: UserProfile },
    { name: 'Company-Info',                   path: '/Company-Info',                  component: CompanyInfo },
    { name: 'Countries',                      path: '/Countries',                     component: Countries },
    { name: 'Proviences',                     path: '/Proviences',                    component: Proviences },
    { name: 'ServicePlans',                   path: '/ServicePlans',                  component: ServicePlans }
];