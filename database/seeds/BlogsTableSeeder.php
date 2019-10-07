<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'blog_category_id' => 1,
                'author' => 'Tommy Wiratama',
                'author_l' => 'Tommy Wiratama',
                'title' => '#WATTsTheDream: WATT Releases First Handbag Collection',
                'title_l' => '#WATTsTheDream: WATT Releases First Handbag Collection',
                'subtitle' => 'The stylish and fun everyday bag that adds charisma to any and all outfits.',
                'subtitle_l' => 'Tas sehari-hari yang penuh gaya dan menyenangkan yang menambah karisma pada pakaian apa saja.',
                'slug' => 'wattsthedream-watt-releases-first-handbag-collection',
            'description' => '<p style="box-sizing: inherit; margin-bottom: 0px; float: left; width: 1198.69px; font-family: &quot;Open Sans&quot;; font-size: 12px; font-stretch: normal; line-height: 2; letter-spacing: 0.5px; color: rgb(61, 61, 61); padding-top: 18px; padding-bottom: 0px !important;"><br class="Apple-interchange-newline">Inspired by their trademark Novelty Shoes, WATT has come out with the Novel Handbag, the stylish and fun everyday bag that adds charisma to any and all outfits. Read on to catch a glimpse of WATT’s first ever collection of handbags, and for inspiration on the accessories you can wear and use while you’re taking the signature bag out and about.</p><p style="box-sizing: inherit; margin-bottom: 0px; float: left; width: 1198.69px; font-family: &quot;Open Sans&quot;; font-size: 12px; font-stretch: normal; line-height: 2; letter-spacing: 0.5px; color: rgb(61, 61, 61); padding-top: 18px; padding-bottom: 0px !important;">WATT has had one strong start of a year, arriving at the online local fashion scene with a wide range of uniquely different slip-on shoes that rebel against traditionally feminine styles still dominating that scene today. Driven by the concept of matching your words with your actions and actually walking the talk, WATT operates around the idea of building your own reality, however different it may be. Of their edgier takes on the classic slip-on mule, it was the Novelty Slip-On that gave WATT their voice among so many other local brands. Within a year, WATT has been able to clearly introduce themselves to Indonesian shoppers, and after exclusively designing and creating shoes WATT has come out with their first collection of handbags.</p><p style="box-sizing: inherit; margin-bottom: 0px; float: left; width: 1198.69px; font-family: &quot;Open Sans&quot;; font-size: 12px; font-stretch: normal; line-height: 2; letter-spacing: 0.5px; color: rgb(61, 61, 61); padding-top: 18px; padding-bottom: 0px !important;">WATT has started with one handbag style in three colourways but the brand is not stopping there. #WATTsTheDream was only the beginning for the brand started by two sisters who push themselves to create and sell accessories that speak for themselves in quality and design. The release of the Novel Handbag is simply the next in a series of steps towards realising WATT’s plans of becoming a lifestyle brand.</p>',
                'description_l' => '<p>Terinspirasi oleh merek dagang Novelty Shoes, WATT telah keluar dengan Novel Handbag, tas sehari-hari yang penuh gaya dan menyenangkan yang menambah karisma pada setiap dan semua pakaian. Baca terus untuk mengetahui sekilas koleksi tas WATT yang pertama, dan untuk inspirasi tentang aksesori yang dapat Anda kenakan dan gunakan saat Anda mengeluarkan tas tanda tangan dan sekitar. WATT telah memiliki awal yang kuat dalam setahun, tiba di kancah mode online online dengan beragam sepatu slip-on unik berbeda yang memberontak melawan gaya tradisional feminin masih mendominasi pemandangan itu hari ini. Didorong oleh konsep mencocokkan kata-kata Anda dengan tindakan Anda dan benar-benar berjalan dalam pembicaraan, WATT beroperasi dengan gagasan membangun realitas Anda sendiri, betapapun berbedanya itu. Dari edgier mereka mengambil keledai slip-on klasik, itu Slip-On Baru yang memberi WATT suara mereka di antara begitu banyak merek lokal lainnya. Dalam setahun, WATT telah dapat dengan jelas memperkenalkan diri kepada pembeli di Indonesia, dan setelah secara eksklusif mendesain dan menciptakan sepatu, WATT telah keluar dengan koleksi tas tangan pertama mereka. WATT telah mulai dengan satu gaya tas tangan dalam tiga warna tetapi merek tersebut tidak berhenti. sana. #WATTsTheDream hanyalah permulaan untuk merek yang dimulai oleh dua saudari yang mendorong diri mereka untuk membuat dan menjual aksesori yang berbicara sendiri dalam kualitas dan desain. Peluncuran Novel Handbag hanyalah langkah berikutnya dari serangkaian langkah menuju mewujudkan rencana WATT untuk menjadi merek gaya hidup.<br></p>',
                'status' => 1,
                'is_home_show' => 0,
                'created_at' => '2019-06-05 06:40:11',
                'updated_at' => '2019-06-05 06:40:11',
            ),
        ));
        
        
    }
}