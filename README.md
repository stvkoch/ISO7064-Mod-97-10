[![Build Status](https://secure.travis-ci.org/stvkoch/ISO7064-Mod-97-10.png)](http://travis-ci.org/stvkoch/ISO7064-Mod-97-10)


Description
===========

Algoritmo que calcula numero de controle, descrito em ISO 7064, Mod 97 10. Normalmente usado para validar IBAN e NIBs de contas bancárias.


Methods
=======

    class ISO7064Mod97_10
        - encode( string/integer $input )
            return checksum number
        - verify( string/integer $input )
            verify if input are valid with your check digits
        - checkCode( string/integer $input )
            return only check digits of input
        - computeCheck( string/integer $input )
            return mod 97 of input
        - getCheck( string/integer $input )
            return only chek digits of input
        - getData( string/integer $input )
            return value of input without check digits

Example
=======

    require 'ISO7064Mod97_10.php'
    $c = new ISO7064Mod97_10();
    $n = 107571;
    $yourNum = $c->encode($n);
    var_dump($yourNum);
    //int(10757107)
    var_dump($c->verify($yourNum));
    $validNumber = '10757107';
    $invalidNumber = '10767107';
    var_dump($c->verify($validNumber));
    var_dump($c->verify($invalidNumber));


Qualquer dúvida entre em contacto <stvkoch at gmail.com> Steven Koch
