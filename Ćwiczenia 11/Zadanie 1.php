<?php
class NoweAuto {
    protected String $model;
    protected float $cena;
    protected float $kurs;

    public function __construct(string $model, float $cena, float $kurs){
        $this->model = $model;
        $this->cena = $cena;
        $this->kurs = $kurs;
    }

    public function ObliczCene() : float {
        return $this->cena * $this->kurs;
    }
}

class AutoZDodatkami extends NoweAuto {
    protected float $alarm;
    protected float $radio;
    protected float $klimatyzacja;

    public function __construct(String $model, float $cena, float $kurs, float $alarm, float $radio, int $klimatyzacja) {
        parent::__construct($model, $cena, $kurs);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    function ObliczCene(): float
    {
        $bezDodatkow = parent::ObliczCene();
        $zDodatkami = $bezDodatkow + $this->klimatyzacja + $this->radio + $this->alarm;
        return $zDodatkami;
    }
}

class Ubezpieczenie extends AutoZDodatkami
{
    private float $ubezpieczenie;
    private int $wiekAuta;

    public function __construct(string $model, float $cena, float $kurs, float $alarm, float $radio, float $klimatyzacja, int $wiekAuta, float $ubezpieczenie)
    {
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja);
        $this->ubezpieczenie = $ubezpieczenie;
        $this->wiekAuta = $wiekAuta;
    }

    public function ObliczCene(): float
    {
        return parent::ObliczCene();
        $cenaKoncowa = parent::ObliczCene();
        return $this->ubezpieczenie * ($cenaKoncowa * ((100 / $this->wiekAuta) / 100));
    }
}

$auto = new Ubezpieczenie("Skoda Superb", 25000, 4.25, 500, 300, 400, 3, 0.05);
echo "Ubezpieczenie: " . $auto->ObliczCene() . " zł.";
?>