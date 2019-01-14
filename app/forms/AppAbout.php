<?php

class AppAbout extends Form {

    public function getForm() {
        return array (
            'title' => 'About',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                    ),
                ),
            ),
        );
    }

    public function getFields() {
        return array (
            array (
                'linkBar' => array (
                    array (
                        'label' => 'Save',
                        'buttonType' => 'success',
                        'options' => array (
                            'ng-if' => 'false',
                        ),
                        'type' => 'LinkButton',
                    ),
                ),
                'title' => 'Seputar Halaman',
                'showSectionTab' => 'No',
                'type' => 'ActionBar',
            ),
            array (
                'totalColumns' => '1',
                'column1' => array (
                    array (
                        'display' => 'all-line',
                        'type' => 'Text',
                        'value' => '<div class=\"default-content-panel\">
    <h2>
        Tentang Kami
    </h2>
    <hr>
    <br>
    <p>
        Korpus Indonesia adalah bagian dari program pengembangan korpus dari Badan Pengembangan dan Pembinaan Bahasa, Kementerian Pendidikan dan Kebudayaan Republik Indonesia.
    </p>
    <p>
Pada tahap awal ini, data korpus bersumber dari teks ilmiah, yang mencakup artikel ilmiah yang dipublikasikan pada jurnal nasional terakreditasi, serta skripsi dan tesis dari beberapa universitas terkemuka di Indonesia. Secara garis besar, bidang ilmu yang tercakup dalam korpus ini adalah Ilmu Kesehatan, Ilmu Hayati, Ilmu Fisika, dan Ilmu Sosial. Pembagian bidang ilmu tersebut didasari oleh Scopus, yang merupakan penyedia basis data terbesar untuk rujukan ilmiah. Pada saat diluncurkan, Oktober 2018, korpus ini terdiri atas 2.250 berkas dengan total jumlah 5.488.035 kata.
    </p>
    <h2>
        Tim Redaksi
    </h2>
    <hr>
    <br>
    <ul>
        <li>
            Pengarah: Prof. Dr. Dadang Sunendar, M.Hum., Kepala Badan Pengembangan dan Pembinaan Bahasa    
        </li>
        <li>
            Penanggung jawab: Prof. Dr. Gufran Ali Ibrahim, M.S., Kepala Pusat Pengembangan dan Pelindungan            
        </li>
        <li>
            Pemimpin Redaksi: Dr. Dora Amalia, Kepala Bidang Pengembangan            
        </li>
        <li>
            Pengembang Pangkalan Data: Azhari Dasman Darnis, M.Hum., Deny A. Kwary, Ph.D., Almira F. Artha, M.Hum. Toni Gunawan, S.Kom., Richard   
        </li>
        <li>
            Pengembang Aplikasi: Insan Kamil, S.Kom., Jessica, S.Kom.    
        </li>
    </ul>
</div>',
                    ),
                    array (
                        'type' => 'Text',
                        'value' => '<column-placeholder></column-placeholder>',
                    ),
                ),
                'w1' => '100%',
                'w2' => '50%',
                'type' => 'ColumnField',
            ),
            array (
                'type' => 'Text',
                'value' => '<?php
    include(\'footer.php\');
?>',
            ),
        );
    }

}