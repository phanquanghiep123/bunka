<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
        //seed construct
        $this->call(WebconfigsDatabaseSeeder::class);
        $this->call(ModulesDatabaseSeeder::class);   
        $this->call(StatusDatabaseSeeder::class);
        $this->call(LanguagesDatabaseSeeder::class);
        $this->call(StatusLanguageDatabaseSeeder::class);
        $this->call(LanguageLabelsDatabaseSeeder::class);
        $this->call(LanguageValuesDatabaseSeeder::class);
        $this->call(RolesDatabaseSeeder::class);
        $this->call(RoleModuleDatabaseSeeder::class);
        $this->call(MenuGroupsDatabaseSeeder::class);
        $this->call(MenusDatabaseSeeder::class);
        $this->call(MenusLanguageDatabaseSeeder::class);
        $this->call(StatusRoleDatabaseSeeder::class);
        //!seed construct
        $this->call(BranchsDatabaseSeeder::class);
        $this->call(AreasDatabaseSeeder::class);
        //;
        $this->call(CustomersDatabaseSeeder::class);
        $this->call(UsersDatabaseSeeder::class);

        $this->call(EmailtemplateDatabaseSeeder::class);
        $this->call(EmailtemplateValuesDatabaseSeeder::class);

        $this->call(ExcelTemplatesDatabaseSeeder::class);
        $this->call(ExcelTemplatesLanguageDatabaseSeeder::class);

        //$this->call(OtherModulesDatabaseSeeder::class);
       // $this->call(UpdateMenus::class);
        $this->call(MstclassDatabaseSeeder::class);
        $this->call(MstfactoryitemDatabaseSeeder::class);
        $this->call(MstitemclassDatabaseSeeder::class);
        $this->call(MstitemDatabaseSeeder::class);
        $this->call(MstitemlimitDatabaseSeeder::class);
        $this->call(MstitempriceDatabaseSeeder::class);

        //$this->call(MstuserDatabaseSeeder::class);
        $this->call(MstclassLanguageDatabaseSeeder::class);
        //$this->call(TrnquotationDatabaseSeeder::class);
        //$this->call(TrnquotationdetailDatabaseSeeder::class);
        //$this->call(TrnquotationitemDatabaseSeeder::class);
        /*NEW*/
        $this->call(ConstructionsDatabaseSeeder::class);
        $this->call(QuotationNosDatabaseSeeder::class);
        $this->call(QuotationsDatabaseSeeder::class);
        $this->call(QuotationDetailsDatabaseSeeder::class);
        $this->call(QuotationDetailItemsDatabaseSeeder::class);
        $this->call(QuotationOtherDetailsDatabaseSeeder::class);
        $this->call(OrderNosDatabaseSeeder::class);
        $this->call(OrdersDatabaseSeeder::class);
        //$this->call(FactoryProductDatabaseSeeder::class);
        //$this->call(ConstructionsDatabaseSeeder::class)
        //$this->call(ContractsDatabaseSeeder::class);
        //$this->call(ContractPeriodsDatabaseSeeder::class);
        //$this->call(ContractPaymentsDatabaseSeeder::class);


        
        
        /*!NEW*/
       // $this->call(OtherModulesDatabaseSeeder::class);
        //$this->call(UpdateMenus::class);
    }
}
