<?php
include 'koneksi.php';
        //membuat variabel untuk menyimpan data inputan yang di isikan di form
    $password_lama          = $_POST['password_lama'];
    $password_baru          = $_POST['password_baru'];
    $konfirmasi_password    = $_POST['konfirmasi_password'];
    $id = $_POST['id'];

        //cek dahulu ke database dengan query SELECT
        //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
        //encrypt -> md5($password_lama)
    $password_lama  = $password_lama;
    $cek            = $koneksi->query("SELECT password FROM user WHERE password='$password_lama'");

    if($cek->num_rows){
            //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
            //membuat kondisi minimal password adalah 5 karakter
        if(strlen($password_baru) >= 5){
             
            if ($password_baru == $password_lama) {
                 header("location:profil.php?pesan=pwdtdksama");
            }else if($password_baru == $konfirmasi_password){
                   
                    $password_baru  = $password_baru;
                    $update    = $koneksi->query("UPDATE user SET password='$password_baru' WHERE id_user='$id'");
                    if($update){
                        //kondisi jika proses query UPDATE berhasil
                         header("location:profil.php?pesan=berhasilpwd");
                    }else{
                        //kondisi jika proses query gagal
                         header("location:profil.php?pesan=gagalpwd");
                    }                   
                }else{
                    //kondisi jika password baru beda dengan konfirmasi password
                     header("location:profil.php?pesan=gagalkonfirmasi");
                }
            }else{
                //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
                 header("location:profil.php?pesan=min");
            }
        }else{
            //kondisi jika password lama tidak cocok dengan data yang ada di database
             header("location:profil.php?pesan=");
        }
    
    ?>
    