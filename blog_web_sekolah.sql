-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. September 2014 jam 12:13
-- Versi Server: 5.1.30
-- Versi PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_web_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `u` varchar(15) NOT NULL,
  `p` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `u`, `p`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nur Akhwan', 'akhwan90@gmail.com', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `tgl`, `ket`, `tempat`) VALUES
(1, '2013-03-16', 'konsultasi Dosen', 'STMIK El Rahma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `hits` int(4) NOT NULL,
  `tglPost` datetime NOT NULL,
  `kategori` varchar(75) NOT NULL,
  `oleh` varchar(30) NOT NULL,
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `gambar`, `isi`, `hits`, `tglPost`, `kategori`, `oleh`, `publish`) VALUES
(4, 'Vidal Yakin Juve Bisa Raih Treble', 'Jellyfish.jpg', '<p rgb(255,="" 255,="" 255);="" "=""></p><p rgb(255,="" 255,="" 255);="" "=""><b>Turin</b> - Musim lalu Arturo Vidal mencatatkan debut manis bersama Juventus dengan sumbangan Scudetto. Di musim keduanya Vidal ingin pencapaiannya lebih baik lagi yang mana membawa Bianconeri meraih treble.</p><p rgb(255,="" 255,="" 255);="" "="">Dibeli dari Bayer Leverkusen dengan banderol 10,5 juta euro, Vidal langsung jadi pilihan utama di lini tengah Juve. Tak cuma piawai menjaga keseimbangan permainan tim, Vidal juga cukup tajam dengan sumbangan gol-golnya.<br></p><p rgb(255,="" 255,="" 255);="" "="">Di musim pertamanya ia berhasil membawa The Old Lady jadi juara dengan rekor tak terkalahkan. Tak ada yang lebih indah dari mengawali karier di Italia dengan cara seperti itu.<br></p><p rgb(255,="" 255,="" 255);="" "="">"Aku sangat bahagia di Juventus dan dengan apapun yang kulakukan saat ini. Di musim pertamaku aku memenangi Scudetto dan Supercoppa Italia. Dua titel tidak begitu buruk lah. Dan tim terus bermain baik," ujar Vidal seperti dilansir ESPN Star.<br></p><p rgb(255,="" 255,="" 255);="" "="">"Banyak misi yang ingin aku capai di tahun 2013. Mungkin ini akan jadi tahun penting dalam karierku dan juga keluargaku," sambungnya.<br></p><p rgb(255,="" 255,="" 255);="" "="">Dengan performa Juve sejauh ini, tim asal Turin itu memang tetap dicalonkan kuat mempertahankan titel juara Liga Italia. Menjelang libur musim dingin, Juve menutup musim dengan berada di puncak plus unggul delapan poin dari Lazio di peringkat kedua.<br></p><p rgb(255,="" 255,="" 255);="" "="">Lalu di iga Champions mereka sudah mencapai babak 16 besar dan akan melawan Glasgow Celtic. Di ajang Coppa Italia, AC Milan akan jadi lawan di perempatfinal.<br></p><p rgb(255,="" 255,="" 255);="" "="">Maka dari itu Vidal menginginkan Juve bisa menyapu bersih seluruh gelar di musim ini untuk menyempurnakan prestasi yang didapatnya musim lalu.<br></p><p rgb(255,="" 255,="" 255);="" "="">"Misi kami adalah bisa memenangi titel juara (Seri A). Lalu kami akan mencoba memenangi Liga Champions dan Coppa Italia," tegas pemain berpaspor Chile yang sudah membuat 16 gol untuk Juve itu.<br></p><p rgb(255,="" 255,="" 255);="" "="">"Kami sangat siap untuk menghadapi tiga kompetisi ini. AKu punya feeling positif untuk musim ini dan berharap mudah-mudahan semuanya bisa terealisasi," tuntas Vidal yang berusia 25 tahun itu.<br></p><p></p>', 154, '2012-10-07 12:18:32', '11-', 'Nur Akhwan', 1),
(5, 'Van Persie Ukir Torehan Spesial', 'bingung1.JPG', '<p class="MsoNormal"></p><p class="MsoNormal">Manchester - Dengan satu gol ke gawang West Bromwich Albion, Robin van Persie mengemas 27 gol Liga Primer di tahun kalender 2012. Ia pun kembali menjadi topskorer dalam satu tahun kalender.</p><p class="MsoNormal">Dalam kemenangan 2-0 Manchester United atas West Brom, Sabtu (29/12/2012), Van Persie mencetak gol penutup ''Setan Merah'' di menit-menit akhir pertandingan.<br></p><p class="MsoNormal">Disebut Infostrada Live, itu adalah gol ke-27 si penyerang asal Belanda di Liga Primer pada tahun kalender 2012--bersama MU maupun ketika masih membela Arsenal--membuatnya jadi pemain dengan gol terbanyak dalam satu tahun kalender.<br></p><p class="MsoNormal">Luis Suarez memiliki selisih gol terdekat. Tetapi untuk melebihi gol Van Persie di tahun 2012, Suarez butuh tambahan 11 gol ketika membela Liverpool dalam menghadapi Queens Park Rangers dalam laga pada hari Minggu (30/12).<br></p><p class="MsoNormal">Dibeberkan, selain menjadi topskorer Liga Primer musim 2011-12, Van Persie juga menjadi topskorer dalam tahun kalender 2011 lalu. Artinya catatan topskorer dalam satu tahun kalender Premier League sudah ia pegang dua musim beruntun.<br></p><p class="MsoNormal">Satu-satunya pemain lain yang mencatatkan torehan itu secara beruntun adalah Alan Shearer. Ia bahkan menjadi topskorer Liga Primer dalam satu tahun kalender selama tiga tahun beruntun (1994-1996).<br></p><p class="MsoNormal">Sementara pemain yang menjadi topskorer Liga Primer dalam satu tahun kalender selama lebih dari satu kali tetapi tidak secara beruntun adalah Thierry Henry (3 kali) dan Andy Cole (2 kali).<br></p><p></p>', 6, '2012-10-07 12:08:59', '10-', 'Nur Akhwan', 1),
(6, 'Fergie Sebut Van Persie Mengubah Jalannya Laga', 'logo-BI13.jpg', '<p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "=""></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "=""></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">Manchester - Sir Alex Ferguson mengakui bahwa West Bromwich Albion lebih dominan di babak kedua. Namun, semuanya berubah ketika Robin van Persie masuk.</p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">Pada pertandingan di Stadion Old Trafford, Sabtu (29/12/2012) dinihari WIB, Manchester United menang 2-0 atas West Brom berkat gol bunuh diri Gareth McAuley di menit kesembilan dan Van Persie di menit ke-90.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">United mendominasi babak pertama. Tetapi, di babak kedua serangan mereka mandek. Fergie pun kemudian memutuskan untuk menarik keluar Shinji Kagawa dan memainkan Van Persie. Ia juga mengganti Tom Cleverley dengan Paul Scholes.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">Tanpa Kagawa yang menjadi pusat kreativitas di lini tengah, ''Setan Merah'' sempat kesulitan membangun serangan. Sebaliknya, West Brom berbalik memenangi penguasaan bola dan membuat beberapa peluang.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">The Baggies beberapa kali melepaskan umpan ke dalam kotak penalti United, tapi beberapa kali itu juga bek-bek tuan rumah berhasil menghalaunya. Kelak, Fergie akan memuji permainan barisan pertahanan itu.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">Sampai kemudian Van Persie melepaskan tendangan kaki kiri dari sisi kiri pertahanan West Brom. Kemenangan pun mutlak menjadi milik The Red Devils.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">"Dia mengubah jalannya pertandingan buat kami," ujar Fergie di BBC.<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">"Ketika saya memainkan dia dan Paul Scholes, mereka mengamankan pertandingan buat kami. West Brom mendominasi babak kedua dan terus mengirim umpan ke kotak penalti kami. Mereka bermain dengan baik."<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">"Ketika bola datang ke kotak penalti kami, kami harus menghalaunya, dan kami melakukannya dengan baik, lebih baik dari laga mana pun sepanjang musim ini."<br></p><p none;="" margin-top:="" 10px;="" margin-bottom:="" 0px;="" color:="" rgb(44,="" 43,="" 43);="" font-family:="" arial;="" font-size:="" 12px;="" line-height:="" 18px;="" background-color:="" rgb(255,="" 255,="" 255);="" "="">Kemenangan itu mengokohkan posisi United di puncak klasemen. Mereka kini mengoleksi 49 angka, tetap unggul tujuh poin atas Manchester City. Bagi Van Persie sendiri, gol ke gawang West Brom merupakan gol ke-14 di Premier League musim ini.<br></p><p></p><p></p>', 1, '2012-10-07 12:09:10', '10-', 'Nur Akhwan', 1),
(10, 'MU tidak akan datangkan pemain baru di bulan Januari', '', '<div>Sir Alex Ferguson merasa puas dengan kualitas pemain MU saat ini.Manajer Manchester United, Sir Alex Ferguson tidak mempunyai rencana untuk melakukan pembelian pemain pada bursa transfer Januari tahun depan.Ferguson beralasan kekuatan skuad yang ditanganinya sekarang sudah cukup baik.</div><div><br></div><div>MU sementara ini memimpin klasemen sementara Liga Primer Inggris dengan koleksi 49 poin dan berselisih tujuh poin dengan Manchester City yang berada di peringkat kedua.&nbsp;Ferguson musim ini tengah berupaya meraih gelar juara Liga Primer Inggris untuk keduapuluh kalinya.&nbsp;"Saya tidak melakukan tranfer yang serius pada bulan Januari nanti," kata Ferguson.&nbsp;"Saya memang tidak harus melakukan pembelian pemain di bulan Januari karena saya merasa puas dengan skuad pemain saat ini."</div><div><br></div><div>MU sebelumnya memang telah mendatangkan sejumlah pemain berkualitas pada bulan Agustus lalu.&nbsp;Keputusan Paul Scholes yang membatalkan rencananya untuk pensiun telah membuat kekuatan MU bertambah cukup signifikan.&nbsp;Selain itu Sir Alex Ferguson juga telah berhasil mendatangkan dua pemain yang memiliki nama besar sebelum bursa tranfer pada Agustus lalu ditutup, keduanya adalah Robin van Persie yang dibeli dari Arsenal dengan harga Pound 24 juta dan Shinji Kagawa yang harus dia tebus dari Dortmund dengan harga Pound 17 juta.</div><div><br></div><div>"Jangan menahan napas anda menunggu Manchester United turun dalam bursa transfer yang akan dibuka minggu depan," kata Ferguson.&nbsp;"Kalau anda percaya semua yang diberitakan oleh media (tentang pembelian sejumlah pemain baru), maka kami akan jadi klub terbesar di Eropa dan klub ini kemudian menjadi bangkrut !"</div><div><br></div><div>Ferguson juga menjelaskan sejumlah pemain yang cedera selama ini mampu dia tutupi dengan pemain yang ada.</div><div><br></div>', 0, '2012-12-30 23:39:31', '10-', 'admin', 1),
(11, 'Manchester United makin kokoh di puncak klasemen', '', '<div>Manchester United akan mengawali kompetisi liga pada 2013 dengan keunggulan tujuh poin atas Manchester City setelah mengalahkan West Brom, hari Sabtu (29/12).&nbsp;Bermain di kandang sendiri di Old Trafford, Manchester United menang 2-0 berkat gol bunuh diri Gareth McAuley dan Robin van Persie.</div><div><br></div><div>Gol pertama United berawal dari tendangan silang Ashley Young yang dibelokkan oleh McAuley di jantung pertahanan sendiri di awal babak pertama.&nbsp;Gol kedua tim asuhan Alex Ferguson dicetak di akhir babak kedua oleh pemain pengganti, Van Persie yang memanfaatkan umpan Antonio Valencia.&nbsp;Tendangan lengkung Van Persie dari luar kotak penalti gagal diselamatkan kiper West Brom.</div><div><br></div><div>Tiga angka bersih yang didapat dari laga melawan West Brom membuat United kokoh di puncak klasemen sementara dengan nilai 47 dari 20 pertandingan.</div>', 15, '2012-12-30 23:40:24', '10-', 'admin', 1),
(12, 'Fergie: United Sudah Setengah Jalan', '', '<div>Bola.net - Sir Alex Ferguson punya banyak alasan untuk tersenyum. Pria Skotlandia itu tengah menikmati performa bagus Manchester United di Premier League.</div><div><br></div><div>Pada Boxing day lalu, United sukses melebarkan jarak dari peringkat dua Manchester City menjadi tujuh poin di papan klasemen. Tadi malam, United sukses menundukkan West Brom untuk menjaga keunggulannya.</div><div><br></div><div>Satu alasan lain adalah bahwa United berhasil menjaga gawangnya tetap perawan. United selalu kebobolan dalam seluruh pertandingan dalam setahun terakhir, namun kembalinya kapten nemanja Vidic nampaknya memberi pengaruh positif.</div><div><br></div><div>Fergie merasa sangat percaya diri dengan kemampuan timnya dan yakin United sudah setengah jalan untuk memenangkan trofi Premier League. Kini Fergie sudah tenang melihat laga United berikutnya.</div><div><br></div><div>"Kami berada dalam posisi bagus dan sudah setengah jalan untuk jadi juara. Kini kami akan fokus untuk pertandingan melawan Wigan. Saya sangat puas dengan semua pemain di skuad saya, tim ini sama bagusnya dengan semua tim yang pernah saya miliki di Old Trafford," ujar Fergie. (sun/hsw)</div>', 2, '2012-12-30 23:41:39', '10-', 'admin', 1),
(13, 'Fergie Tegaskan Nani Tak Akan Dijual', 'nai.jpg', '<div><b>Bola.net </b>- Sir Alex Ferguson menegaskan bahwa winger asal Portugal mereka, Nani, tak akan dijual pada bursa transfer kali ini. Saat ini Nani masih menjalani perawatan akibat cedera hamstring yang dideritanya sejak November lalu.</div><div><br></div><div>Hubungan Nani dengan pihak klub juga dikabarkan memburuk setelah ia berkelahi dengan pemain muda United Davide Petrucci. Saat fit, Nani juga jarang menjadi pilihan utama Sir Alex.</div><div><br></div><div>Hal itu memicu rumor yang menyebutkan bahwa Nani akan segera hengkang dari Old Trafford. Salah satu klub yang disebut menginginkan jasa Nani adalah Arsenal.</div><div><br></div><div>"Kami tak akan membiarkan Nani pergi. Kontraknya masih tersisa satu setengah tahun lagi. Kami butuh Nani dan dia adalah pemain bertalenta hebat," ujar Fergie.</div><div><br></div><div>Arsenal kabarnya menggunakan transfer Robin van Persie untuk meningkatkan peluang mereka mendapatkan nani. Arsenal ingin agar United membalas jasa dengan merelakan Nani pergi ke Emirates Stadium. (tdm/hsw)</div>', 3, '2012-12-30 23:42:26', '10-', 'admin', 1),
(14, 'Fergie Pun Bingung Cara Benahi Lini Belakang MU', 'Rio_Ferdinand.jpg', '<div>Bola.net - Manajer Manchester United, Sir Alex Ferguson mengaku tak paham bagaimana caranya membenahi masalah di lini pertahanan timnya sejauh musim ini.</div><div><br></div><div>Setan Merah boleh saja nangkring di puncak klasemen Premier League dengan keunggulan tujuh poin dari Manchester City, namun mereka sudah kebobolan 28 gol dalam 19 laga serta tertinggal lebih dulu dalam 16 kesempatan di semua ajang.</div><div><br></div><div>Kemenangan 4-3 di partai Boxing Day kontra Newcastle adalah salah satu dari sekian laga di mana United harus mengandalkan ketajaman lini depan mereka untuk menutupi bobroknya lini belakang. Dan Ferguson mengaku cemas akan hal itu namun tak tahu harus berbuat apa.</div><div><br></div><div>"Saya tak bisa menjawabnya. Saya tak mungkin bisa. Kami sudah menganalisa setiap detail yang mungkin demi mendapatkan ide bagaimana mengatasinya. Kami bisa saja tak menyerang sama sekali, yang bukan cara Manchester United, atau membiarkan suporter kami melalui penderitaan dalam kemenangan 4-3," ujarnya.</div><div><br></div><div>Ferguson sudah mendesak anak asuhnya untuk menghentikan tren negatif itu usai lawan Reading (yang dimenangi United 4-3), namun tetap saja hal itu tak berhenti. Ferguson mencemaskan dengan laga semacam itu tentu akan menguras energi mereka dalam kompetisi yang begitu ketat.</div><div><br></div><div>"Ini adalah salah satu musim di mana kami membiarkan gol konyol terjadi. Tentu saja ini masalah. Jika kami mencetak empat gol di kandang, harusnya kami kebobolan satu atau tidak sama sekali. Itulah caranya membantu selisih gol Anda," imbuhnya. (gl/row)</div>', 23, '2012-12-30 23:43:16', '10-', 'admin', 1),
(15, 'Preview: ManUtd vs WBA, Pembuktian Chicharito!', '', '<div>Bola.net - Setelah berhasil meraih 3 poin saat melawan Newcastle United pada tengah pekan lalu, kini Manchester United siap membungkam West Brom di Old Trafford pada lanjutan EPL matchday 20, Sabtu (29/12).</div><div><br></div><div>Meski kehilangan Wayne Rooney yang terkena cedera lutut, manajer The Red Devils, Sir Alex Ferguson, tidak akan kebingungan. Pasalnya, Javier Hernandez yang tengah on-fire, mengaku siap jadi tandem Robin van Persie di lini depan.</div><div><br></div><div>Namun, Opa Fergie tampaknya akan merotasi sebagian starting line-up guna mengantisipasi faktor kelelahan. Nemanja Vidic dan Phil Jones dipastikan bermain sejak menit awal pertandingan. Sedangkan Anders Lindegaard akan mengisi posisi David de Gea di bawah mistar gawang.</div><div><br></div><div>Sementara itu di kubu tim tamu, manajer The Baggies, Steve Clarke, menempatkan Shane Long di lini depan West Brom, usai kecewa melihat performa pemain pinjaman dari Chelsea, Romelu Lukaku saat melawan QPR.</div><div><br></div><div>Demi mengimbangi lini tengah Manchester United, Clarke dipastikan memakai format 4-5-1 ketika bertandang ke Old Trafford. Selain itu, West Brom yang kerap unggul dalam duel udara, coba mengoptimalkan set-pieces yang mereka dapat ketika laga telah di mulai.</div><div><br></div>', 0, '2012-12-30 23:44:59', '10-', 'admin', 1),
(16, 'Review: Tren Kemenangan United Terus Berlanjut', '', '<div><b>Bola.net </b>- Menjamu West Brom di Old Trafford Manchester United menuai kemenangan dengan skor 2-0 pada Sabtu (29/12). Dan tren 3 angka MU pun terus berlanjut.</div><div><br></div><div>Fans United tak menyana dua striker yang mencetak gol di laga tengah pekan sebelumnya malah dicadangkan Fergie. Gantinya sang gaffer memasang Kagawa dan Welbeck di lini depan.</div><div><br></div><div>Terobosan demi terobosan coba disusun MU ke area pertahanan West Brom, namun lini belakang tim tamu nampak terus bermain rapat.</div><div><br></div><div>Barulah di menit 9 papan skor berubah, Ashley Young yang menerima umpan Kagawa ingin melepaskan crossing, namun bola malah masuk ke gawang karena menyentuh kaki bek WBA sendiri, Gareth McAuley. Gol bunuh diri tersebut menjadikan skor 1-0.</div><div><br></div><div>MU terus berupaya menggandakan keunggulan namun belum ada lagi gol tercipta di babak pertama. Peluang terbaik sempat didapat Ashley Young namun tembakannya di dalam kotak penaltinya masih bisa ditepis Ben Foster dan hanya membentur mistar.</div><div><br></div><div>Babak kedua dibuka oleh sejumlah perlawanan yang coba ditawarkan WBA, sayangnya situasi bola mati yang sering mereka dapatkan juga belum jua menemui hasil.</div><div><br></div><div>Kartu kuning pertama di laga ini baru tercipta di menit 63, Antonio Valencia menerimanya usai si winger mengganggu Odemwingie dengan cara yang cukup kasar.</div><div><br></div><div>Demi menaikkan daya dobrak kedua kubu melakukan pergantian pemain dengan memasukkan striker. MU memasukkan Robin Van Persie sementara WBA, Romelu Lukaku.</div><div><br></div><div>Pergantian MU ternyata yang lebih manjur, meski begitu baru di menit 90 gol tambahan datang. Robin Van Persie melepaskan tembakan menyilang untuk merobek jala gawang Ben Foster di penghujung laga.</div><div><br></div><div>Tambahan 3 angka membuat MU terus di posisi pertama tabel sementara Premier League dengan koleksi 49 poin, dan tetap berjarak 7 poin dari rival terdekat City, yang di lain tempat menang 4-3 atas Norwich City.</div><div><br></div><div>Starting Line Up:</div><div>Manchester United: De Gea; Smalling, Vidic, Evans, Evra; Valencia, Carrick, Cleverley (Scholes 83''), Young; Kagawa (RVP 66''); Welbeck.</div><div>Subs: Van Persie, Ferdinand, Giggs, Buttner, Lindegaard, Hernandez, Scholes.</div><div>West Brom: Foster; Jones, McAuley, Tamas, Ridgewell; Thorne, Brunt (Morrison 75''); Rosenberg (Lukaku 67''), Dorrans (Fortune 83''), Odemwingie; Long.</div><div>Subs: Myhill, Lukaku, Morrison, Jara Reyes, Fortune, Dawson, El Ghanassy. (bola/lex)</div>', 2, '2012-12-30 23:45:29', '10-', 'admin', 1),
(17, 'Kenapa Ferguson Tak Suka Belanja di Musim Dingin?', '', '<div><b>Bola.net </b>- Ketika beberapa klub sudah antusias bersiap menyambut jendela transfer musim dingin guna memperkuat diri, Sir Alex Ferguson malah kalem.</div><div><br></div><div>Gaffer Manchester United itu mengaku tidak pernah suka dengan penambahan amunisi di tengah musim, dan ia punya alasan tersendiri akan hal tersebut.</div><div><br></div><div>"Bursa transfer Januari tidak pernah menjadi bursa transfer terbaik dan itu telah terbukti selama bertahun-tahun dengan sangat sedikitnya transfer-transfer besar terjadi," ucapnya.</div><div><br></div><div>Fergie mengacu pada kondisi beberapa tahun terakhir, ketika sangat jarang terjadi pembelian-pembelian yang sukses pada Januari.</div><div><br></div><div>Justru yang lebih sering terjadi adalah pembelian pemain dengan biaya besar namun tidak sukses di kemudian hari.</div><div><br></div><div>Hasilnya, kemungkinan klub-klub panik dengan prospek memiliki tim yang tidak maksimal sampai Mei dengan sekelompok pemain yang gagal memenuhi harapan.</div><div><br></div><div>"Semua transfer besar terjadi pada musim panas," imbuh pria yang sudah bekerja di Old Trafford sejak 26 tahun silam tersebut. (dym/lex)</div>', 4, '2012-12-30 23:46:06', '10-', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_komen`
--

CREATE TABLE IF NOT EXISTS `berita_komen` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_berita` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` varchar(250) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `berita_komen`
--

INSERT INTO `berita_komen` (`id`, `id_berita`, `nama`, `email`, `komentar`, `tgl`) VALUES
(1, 16, 'Akhwan', 'akhwan08@yahoo.com', 'yak.. sip sekali..', '2013-01-13 19:44:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE IF NOT EXISTS `data_guru` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama`, `nip`, `mapel`, `jk`, `alamat`, `foto`) VALUES
(1, 'Nur Akhwan, S.Pd.Kom', '19900326 201601 1 002', 'Komputer', 'L', 'Sumoroto, Sidoharjo, Samigaluh, Kulon Progo', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kelas` enum('1','2','3','4','5','6','L') NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `nis`, `kelas`, `jk`, `alamat`, `foto`, `pass`) VALUES
(1, 'NUr Akhwan', '12090672', '6', 'L', 'Sumoroto, Sidoharjo, Samigaluh, Kulon Progo', '', ''),
(2, 'Akhwan Noor', '19900326', '2', 'L', 'Sidoharjo', '', 'ac6b8d6e684cf536759a626b83985b33'),
(3, 'Akhwan Januzaj', '19950207', '3', 'L', 'Sir Matt Busby Way', '', '4b001528d78c25589ad42b115edd539e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_album` int(3) NOT NULL,
  `file` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `id_album`, `file`, `ket`) VALUES
(1, 1, 'Desert.jpg', 'Desert'),
(2, 1, 'Koala.jpg', 'Koala'),
(3, 1, 'Penguins.jpg', 'Penguins'),
(4, 1, 'Light_house.jpg', 'Light House'),
(5, 1, 'Chrysanthemum.jpg', 'Chrysanthemum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_album`
--

CREATE TABLE IF NOT EXISTS `galeri_album` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `galeri_album`
--

INSERT INTO `galeri_album` (`id`, `nama`) VALUES
(1, 'foto sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haldep`
--

CREATE TABLE IF NOT EXISTS `haldep` (
  `isi` longtext NOT NULL,
  `id` int(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `haldep`
--

INSERT INTO `haldep` (`isi`, `id`) VALUES
('<p><i><b>Assalamu''alaikum warah matullohi wabarakatuh</b></i></p><p>Selamat datang di website Sekolah Dasar Negeri Sidareja, Cilacap, Jawa Tengah. Mudah-mudahan dengan adanya media informasi websie ini dapat digunakan sebagai media tukar menukar informasi antara SD Negeri Sidareja, dengan masyarakat.&nbsp;<br></p><p><i><b>Wassalamu''alaikum warah matullohi wabarakatuh</b></i></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat`
--

CREATE TABLE IF NOT EXISTS `kat` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `kat`
--

INSERT INTO `kat` (`id`, `nama`) VALUES
(10, 'Manchester United'),
(11, 'Juventus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id`, `nama`, `alamat`) VALUES
(1, 'Kemdiknas', 'http://kemdiknas.go.id/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`, `tgl`) VALUES
(1, 'Nur Akhwan', 'akhwan90@gmail.com', 'Dicoba lagi', '2012-11-20 10:13:37'),
(2, 'SMK Negeri 1 Pangkalan Banteng', 'akhwan90@gmail.com', 'super sekali', '2012-11-20 10:13:49'),
(4, 'Akhwan', 'akhwan90@gmail.com', 'mau kirim program, bagaimana pesannya..?', '2012-12-30 18:13:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tanya` varchar(255) NOT NULL,
  `op_1` varchar(200) NOT NULL,
  `op_2` varchar(200) NOT NULL,
  `op_3` varchar(200) NOT NULL,
  `op_4` varchar(200) NOT NULL,
  `j_1` int(3) NOT NULL,
  `j_2` int(3) NOT NULL,
  `j_3` int(3) NOT NULL,
  `j_4` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `poll`
--

INSERT INTO `poll` (`id`, `tanya`, `op_1`, `op_2`, `op_3`, `op_4`, `j_1`, `j_2`, `j_3`, `j_4`) VALUES
(1, 'Bagaimanakah design website ini ?', 'Sangat Bagus', 'Bagus', 'Bagus Sekali', 'Tidak Jelek', 8, 2, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `judul`, `isi`) VALUES
(1, 'Sejarah', 'Maaf, pemiarsa...<br>\r\nBelum ada konten..'),
(2, 'Visi Misi', 'Maaf pemiarsa..<div>Belum Ada konten :)</div>');
