        $(function(){
               $(document).on('click','.add-anggota',function(e){
                e.preventDefault();
                $("#modal-anggota").modal('show');
                $(".modal-title").html('TAMBAH DATA ANGGOTA');
                $.get("view/anggota/anggota_form.php",
                    {id_pelamar:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-anggota',function(e){
                e.preventDefault();
                $("#modal-ubah-anggota").modal('show');
                $(".modal-title").html('UBAH DATA ANGGOTA');
                $.get("view/anggota/anggota_ubah.php",
                {id_anggota:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.d-supplier',function(e){
                e.preventDefault();
                $("#modal-detail-supplier").modal('show');
                 $(".modal-title").html('DETAIL SUPPLIER');
                $.get("view/supplier/supplier_detail.php",
                {id_supp:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });

                $(document).on('click','.add-pengajuan',function(e){
                e.preventDefault();
                $("#modal-pengajuan").modal('show');
                 $(".modal-title").html('TAMBAH PENGAJUAN');
                $.get("view/pinjaman/pengajuan_form.php",
                {id_info:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-pengajuan',function(e){
                e.preventDefault();
                $("#modal-ubah-pengajuan").modal('show');
                 $(".modal-title").html('UBAH PENGAJUAN');
                 $.get("view/pinjaman/pengajuan_ubah.php",
                {id_pin:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
            $(document).on('click','.approve-pengajuan',function(e){
                e.preventDefault();
                $("#modal-approve-pengajuan").modal('show');
                 $(".modal-title").html('APPROVE PENGAJUAN');
                 $.get("view/pinjaman/approve.php",
                {id_pin:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-angsuran',function(e){
                e.preventDefault();
                $("#modal-add-angsuran").modal('show');
                 $(".modal-title").html('FORM ANGSURAN');
                $.get("view/angsuran/angsuran_form.php",
                {id_pin:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.detail-harga',function(e){
                e.preventDefault();
                $("#modal-detail-harga").modal('show');
                 $(".modal-title").html('DETAIL HARGA');
                $.get("view/harga/harga_lihat.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.upload-gambar',function(e){
                e.preventDefault();
                $("#modal-upload-gambar").modal('show');
                 $(".modal-title").html('UPLOAD GAMBAR');
                $.get("view/gambar/gambar_form.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                 $(document).on('click','.lihat-gambar',function(e){
                e.preventDefault();
                $("#modal-lihat-gambar").modal('show');
                 $(".modal-title").html('LIHAT GAMBAR');
                $.get("view/gambar/gambar_lihat.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
    
         
        });