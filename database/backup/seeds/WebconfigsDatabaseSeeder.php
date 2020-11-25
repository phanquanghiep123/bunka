<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class WebconfigsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'key' => 'ClassCurrency',
                'value' => '2',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '2',
                'key' => 'ClassFactoryPriceKey',
                'value' => '7',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '3',
                'key' => 'ClassKeyAdmin',
                'value' => '1',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '4',
                'key' => 'ClassParent',
                'value' => '0',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '5',
                'key' => 'ClassPattern',
                'value' => '5',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '6',
                'key' => 'ClassPricePatternKeyName',
                'value' => '6',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '7',
                'key' => 'ClassProduct',
                'value' => '1',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '8',
                'key' => 'ClassTax',
                'value' => '3',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '9',
                'key' => 'ClassUserLevel',
                'value' => '4',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '10',
                'key' => 'DataHasNotSaved',
                'value' => 'Data has not saved. Do you want to continue?',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '11',
                'key' => 'DoorMatrix',
                'value' => '1',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '12',
                'key' => 'FileConfigName',
                'value' => 'config.ini',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '13',
                'key' => 'FrameMatrix',
                'value' => '2',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '14',
                'key' => 'MessageChangePasswordError',
                'value' => 'Password changed unsuccessfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '15',
                'key' => 'MessageChangePasswordOK',
                'value' => 'Password changed successfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '16',
                'key' => 'MessageCheckInvalidNumber',
                'value' => '{0} is invalid number.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '17',
                'key' => 'MessageCheckNull',
                'value' => '{0} must not be null.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '18',
                'key' => 'MessageConfirmDelete',
                'value' => 'Are you sure to delete ?',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '19',
                'key' => 'MessageConfirmPasswordIncorrect',
                'value' => 'Password confirm is not correct.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '20',
                'key' => 'MessageConfirmSearchQuotation',
                'value' => 'Quotation is not exists. Do you want to search?',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '21',
                'key' => 'MessageDeleteError',
                'value' => 'Delete unsuccesfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '22',
                'key' => 'MessageDeleteOK',
                'value' => 'Delete succesfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '23',
                'key' => 'MessageDeteteErrorByFK',
                'value' => 'Can not delete because it has another reference.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '24',
                'key' => 'MessageDiscardSave',
                'value' => 'Are you sure to discard all changes.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '25',
                'key' => 'MessageDuplicateKey',
                'value' => '{0} is duplicate.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '26',
                'key' => 'MessageFileInUse',
                'value' => 'This file is used by another program.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '27',
                'key' => 'MessageItemLimitChildItemClass',
                'value' => 'Child Item Class must be different Parent Item Class.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '28',
                'key' => 'MessageLackOfQuoSheet',
                'value' => 'The number of sheet  is not equal produce amount.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '29',
                'key' => 'MessageNewPasswordNull',
                'value' => 'New password must not be null.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '30',
                'key' => 'MessageNoChange',
                'value' => 'Data has no change.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '31',
                'key' => 'MessageNotEnoughFileImport',
                'value' => 'Not enough file to import.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '32',
                'key' => 'MessagePasswordNotCorrect',
                'value' => 'Password is not correct.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '33',
                'key' => 'MessageQuoHasNoDetail',
                'value' => 'Quotation doesn\'t have data.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '34',
                'key' => 'MessageQuotationItemInvalid',
                'value' => 'Item has not input yet.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '35',
                'key' => 'MessageSaveOK',
                'value' => 'All changes have saved successfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '36',
                'key' => 'MessageSystemErrorOK',
                'value' => 'A system error has occured.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '37',
                'key' => 'MessageTitle',
                'value' => 'Message',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '38',
                'key' => 'MessageUpdateDetailOK',
                'value' => 'Update quotation successfully.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:29',
                'updated_at' => '2019-05-21 16:00:29',
            ],

            [
                'id' => '39',
                'key' => 'MessageUserNameNotExist',
                'value' => 'Username is not exist.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '40',
                'key' => 'MessageUserNameNull',
                'value' => 'Username must not be null.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '41',
                'key' => 'MessageValueInvalid',
                'value' => '{0} is invalid.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '42',
                'key' => 'MessageValueMatrixNotInputed',
                'value' => 'Not exist price for inputed width and height.',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '43',
                'key' => 'MessageWarningImport',
                'value' => 'All master data will be deleted.{0}Do you want to import new master data?',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '44',
                'key' => 'MessageWarningImportTrnQuotation',
                'value' => 'All quotation data will be deleted.{0}Do you want to import new quotation data?',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '45',
                'key' => 'OldFileConfigName',
                'value' => 'config_old.ini',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '46',
                'key' => 'PricePatternInlandFee',
                'value' => '11',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '47',
                'key' => 'PricePatternInstallationQSMini',
                'value' => '16',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '48',
                'key' => 'PricePatternInstallFee',
                'value' => '10',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '49',
                'key' => 'PricePatternMatrix',
                'value' => '12',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '50',
                'key' => 'PricePatternParentPrice',
                'value' => '4',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '51',
                'key' => 'PricePatternYesNo',
                'value' => '13',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '52',
                'key' => 'ValueCannotDelete',
                'value' => '-99',
                'content' => null,
                'type' => null,
                'created_at' => '2019-05-21 16:00:30',
                'updated_at' => '2019-05-21 16:00:30',
            ],

            [
                'id' => '53',
                'key' => 'QuotaitionID',
                'value' => '17',
                'content' => null,
                'type' => null,
                'created_at' => '2019-06-10 08:48:32',
                'updated_at' => '2019-06-10 08:48:32',
            ],

            [
                'id' => '54',
                'key' => 'OrDerID',
                'value' => '14',
                'content' => null,
                'type' => null,
                'created_at' => '2019-06-10 10:36:25',
                'updated_at' => '2019-06-10 10:36:34',
            ],

            [
                'id' => '55',
                'key' => 'StatusID',
                'value' => '18',
                'content' => null,
                'type' => null,
                'created_at' => '2019-06-19 09:58:10',
                'updated_at' => '2019-06-19 09:58:10',
            ],

            [
                'id' => '56',
                'key' => 'languagelabelsID',
                'value' => '9',
                'content' => null,
                'type' => null,
                'created_at' => '2019-06-26 03:30:05',
                'updated_at' => '2019-06-26 03:30:05',
            ],

            [
                'id' => '57',
                'key' => 'ContractID',
                'value' => '13',
                'content' => null,
                'type' => null,
                'created_at' => '2019-06-27 07:57:11',
                'updated_at' => '2019-06-27 07:57:11',
            ],

            [
                'id' => '58',
                'key' => 'TaxLocation',
                'value' => '10',
                'content' => null,
                'type' => null,
                'created_at' => '2019-07-01 03:02:16',
                'updated_at' => '2019-07-01 03:02:16',
            ],

            [
                'id' => '59',
                'key' => 'TaxForeign',
                'value' => '15',
                'content' => null,
                'type' => null,
                'created_at' => '2019-07-01 03:05:02',
                'updated_at' => '2019-07-01 03:05:02',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("webconfigs", $item);
        }
    }

}