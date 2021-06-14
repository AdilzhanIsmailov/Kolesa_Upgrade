<?php
namespace Helper;



class CustomCardNumberFaker 
{

    protected $cardNumbers = [
        '4402573500981944',
        '5450001422392234',
        '4201057431995134',
        '5450459104951205'
    ];

    /**
     * Возвращает случайный номер карты из 4 заданных
     */
    public function getCardNumber()
    {
        return sprintf(
            '%d',
            $this->cardNumbers[array_rand($this->cardNumbers)]
        );
    }

    protected $cardCvv = [
        '563',
        '777',
        '222',
        '190'
    ];

    public function getCardCvv()
    {
        return sprintf(
            '%d',
            $this->cardCvv[array_rand($this->cardCvv)]
        );
    }
}
