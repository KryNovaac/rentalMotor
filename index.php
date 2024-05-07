<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="wrapper">
      <div class='body'>
        <span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class='base'>
          <span></span>
          <div class='face'></div>
        </div>
      </div>
      <div class='longfazers'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      </body>
    </div>
</header>
<script src="js.js"></script>
    <div class="m1">
        <h1 class="h1">Rental Motor</h1>
        <form action="index.php" method="post">
            <label for="nama_pelanggan">Name :</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
            <br>
            <label for="lama_rental">Time :</label>
            <input type="number" id="lama_rental" name="lama_rental" min="1" required>
            <br>
            <label for="jenis_motor">Type</label>
            <select id="jenis_motor" name="jenis_motor" required>
                <option value="Kawasaki">Kawasaki</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Honda">Honda</option>
                <option value="Suzuki">Suzuki</option>
                
            </select>
            <br><br>
            <button class="a satu" type="submit">Submit</button>
        </form>
        <div class="m2">
        <?php
        //Member
        $members = array("XVIP", "VVVIP", "VIP", "VVIP");

        class RentalMotor {
            protected $harga_per_hari;
            protected $lama_rental;
            protected $diskon_member = 0.05; 

            public function __construct($lama_rental) {
                $this->lama_rental = $lama_rental;
            }

            public function hitungTotal($nama_pelanggan) {
                $total = $this->lama_rental * $this->harga_per_hari;
                if (in_array($nama_pelanggan, $GLOBALS['members'])) {
                    $total -= $total * $this->diskon_member; 
                }
                $ppn = 10 / 100 * $total;

                echo "<h2>Bukti Transaksi</h2>";
                echo "<p>Nama Pelanggan: <strong>$nama_pelanggan</strong></p>";
                echo "<p>Jenis motor yang dirental: p>" .get_class($this);
                echo "<p>Lama rental: <strong>{$this->lama_rental} Hari</strong></p>";
                echo "<p>Harga rental per-harinya: Rp. <strong>" . number_format($this->harga_per_hari, 0, ',', '.') . "</strong></p>";
                echo "<p>Total yang harus dibayarkan: Rp. <strong>" . number_format($total, 0, ',', '.') . "</strong></p>";
                echo "<p>Tambahan Pajak: Rp. " . number_format($ppn, 0, ',', '.') . "</p>";
            }
        }

        
        class Kawasaki extends RentalMotor {
            protected $harga_per_hari = 750000; 
        }
        class Yamaha extends RentalMotor {
            protected $harga_per_hari = 500000; 
        }
        class Honda extends RentalMotor {
            protected $harga_per_hari = 450000; 
        }
        class Suzuki extends RentalMotor {
            protected $harga_per_hari = 400000; 
        }

        
        if (isset($_POST['nama_pelanggan']) && isset($_POST['lama_rental']) && isset($_POST['jenis_motor'])) {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $lama_rental = $_POST['lama_rental'];
            $jenis_motor = $_POST['jenis_motor'];

            
            switch ($jenis_motor) {
                case 'Kawasaki':
                    $rental = new Kawasaki($lama_rental);
                    break;
                case 'Yamaha':
                    $rental = new Yamaha($lama_rental);
                    break;
                case 'Honda':
                    $rental = new Honda($lama_rental);
                    break;
                case 'Suzuki':
                    $rental = new Suzuki($lama_rental);
                    break;
            }

            
            $rental->hitungTotal($nama_pelanggan);
        }
        ?>
        </div>
    </div>
</body>
</html>
