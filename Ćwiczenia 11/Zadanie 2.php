<?php
class Product{
    private string $name;
    private int $price;
    private int $quantity;

    public function __construct(string $name, int $price, int $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getPrice(): float{
        return $this->price;
    }

    public function getQuantity(): int{
        return $this->quantity;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function setPrice(float $price): void{
        $this->price = $price;
    }

    public function setQuantity(int $quantity): void{
        $this->quantity = $quantity;
    }

    public function __toString(){
        return "<br>Product: {$this->name}, Price: {$this->price}, Quantity: {$this->quantity}";
    }
}

class Cart {
    private array $products;

    public function __construct() {
        $this->products = [];
    }

    public function addProduct(Product $product): void{
        $this->products[] = $product;
    }

    public function removeProduct(Product $product) {
        foreach ($this->products as $indeks => $p) {
            if ($p->getName() === $product->getName()) {
                unset($this->products[$indeks]);
                $this->products = array_values($this->products);
                break;
            }
        }
    }

    public function getTotal(): float {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString(): string {
        $wyjscie = "Products in cart:<br>";
        foreach ($this->products as $product) {
            $wyjscie .= $product;
        }
        $wyjscie .= "<br><br>Total price: " . $this->getTotal();
        return $wyjscie;
    }
}

$product1 = new Product("Laptop", 1500, 1);
$product2 = new Product("Mouse", 100, 1);

$koszyk = new Cart();
$koszyk->addProduct($product1);
$koszyk->addProduct($product2);

echo $koszyk;

?>
