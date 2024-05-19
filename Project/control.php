<?php
function email_kontrol($email){
    $regex='/^[a-zA-Z][0-9]{9}@sakarya\.edu\.tr$/';

    return preg_match($regex,$email)===1;
}
$kullaniciadi=$_POST["kullaniciadi"];
$sifre=$_POST["sifre"];

echo"Kullanıcı Adı: ".$kullaniciadi;
echo"Şifre: ".$sifre;

if(!email_kontrol($kullaniciadi)){
    echo "Geçersiz kullanıcı adı. Kullanıcı adınız b123456789@sakarya.edu.tr şeklinde olmalıdır";
}
else{
    $numara=explode('@',$kullaniciadi)[0];

    if($sifre===$numara){
        $_SESSION['username']=$numara;
        header("Location: welcome.php");
        exit();
    }
    else{
        header("index.html");
        exit();
    }
}

?>