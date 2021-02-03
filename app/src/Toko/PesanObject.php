<?php

use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class PesanObject extends DataObject
{
    private static $db = [
        'Qty' => 'Int',
        'Total' => 'Currency',
    ];

    private static $many_many = [
        'BarangObjects' => BarangObject::class
    ];

    public function onBeforeWrite()
    {
        if (!$this->isInDb()) {
            $barang = BarangObject::get()->byID($this->BarangObjects);
        
            if ($barang->Stock < $this->Qty) {
                throw new \Exception('Qty melebihi stock yang ada');
            }

            LogStock::create([
                'id_barang'=>$this->BarangObjects, 
                'stock_before'=>$barang->Stock, 
                'stock_after'=>$barang->Stock - $this->Qty]
            )->write();
            
            $this->Total = $this->Qty * $barang->Price;
            
            $barang->Stock = $barang->Stock - $this->Qty;
            $barang->write();
        }
        parent::onBeforeWrite();
    }

    public function getCMSFields()
    {
        return new FieldList(
            DropdownField::create(
                'BarangObjects',
                'Barang',
                BarangObject::get()->map('ID', 'Name')
            ),
            TextField::create(
                'Qty'
            )
        );
    }
}