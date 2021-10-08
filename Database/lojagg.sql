-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Mar-2020 às 18:20
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojagg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Archer', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`category_id`, `NAME`) VALUES
(1, 'Computadores'),
(2, 'Telemoveis'),
(3, 'Perifericos'),
(4, 'Componentes'),
(5, 'Imagem'),
(6, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

DROP TABLE IF EXISTS `encomenda`;
CREATE TABLE IF NOT EXISTS `encomenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataencomenda` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `estadoencomenda_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_idx` (`users_id`),
  KEY `estadoencomenda_idx` (`estadoencomenda_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendaprodutos`
--

DROP TABLE IF EXISTS `encomendaprodutos`;
CREATE TABLE IF NOT EXISTS `encomendaprodutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `produtostatus_id` int(11) NOT NULL,
  `encomenda_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produtostatus_idx` (`produtostatus_id`),
  KEY `encomenda_idx` (`encomenda_id`),
  KEY `produtos_idx` (`produtos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadoencomenda`
--

DROP TABLE IF EXISTS `estadoencomenda`;
CREATE TABLE IF NOT EXISTS `estadoencomenda` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodopagamento`
--

DROP TABLE IF EXISTS `metodopagamento`;
CREATE TABLE IF NOT EXISTS `metodopagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descricao` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_idx` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `category_id`, `image`) VALUES
(2, 'Alienware 17 Laptop', 949.99, '8th Generation Intel Core i7-8750H (6-Core, 9MB Cache, up to 4. 1GHz W/ Turbo Boost) 17. 3 inch FHD (1920 x 1080) 60Hz IPS Anti-Glare 300-nits | NVIDIA GeForce GTX 1070 with 8GB GDDR5 16GB, DDR4, 2400MHz 256GB Pie Solid State Drive + 1TB 7200Rpm HDD Lithium Ion (99 Why) Battery | Windows 10 Home', 1, '6043.png'),
(3, 'Alienware 15 Laptop', 899.99, 'Intel Core i7-4710HQ Processor (6M Cache, 2.5 GHz) 16 GB DDR3 RAM 1 TB 5400 rpm Hard Drive, 128 GB Solid-State Drive 15.6Inch Screen, NVIDIA GeForce GTX 970M with 3GB GDDR5 Windows 8.1', 1, '30520.png'),
(9, 'Acer Aspire GX 781 Desktop', 1099.99, 'Frequencia do processador: 3 GHz, Familia do processador: 7th gen IntelÂ® Coreâ„¢ i5, Modelo de processador: i5-7400. MemÃ³ria interna: 16 GB, Tipo de memÃ³ria interna: DDR4-SDRAM, Velocidade de memory clock: 2133 MHz. Capacidade total de armazenagem: 1256 GB, Armazenamento: HDD+SSD, Tipo de drive Ã³tico: DVD Super Multi DL. Modelo de adaptador grÃ¡fico a bordo: IntelÂ® HD Graphics 630, Modelo de adaptador grÃ¡fico discreto: NVIDIAÂ® GeForceÂ® GTX 1060. Sistema operacional instalado: Windows 10 Home, Arquitetura do sistema operacional: 64-bit. Fonte de alimentaÃ§Ã£o: 500 W', 1, '16529.png'),
(10, 'MSI Vortex G65 SLI', 1999.99, 'Intel Core i7-6700K processor - 4-4.2GHz w/ Turbo Boost\r\nNVIDIA GeForceDual GTX980 [SLI] 16G GDDR5 (8GB each)\r\n32GB (8G*4) DDR4 2133MHz and Super Raid 4 512GB SSD (PCIE GEN3 NVMe)(256GB*2) +1TB (SATA) 7200rpm\r\nWindows 10 Home; Nahimic Sound; Dual Killer Gaming Network E2400; Killer N1535 Combo (2*2 ac); Bluetooth; USB 3.0; HDMI; Storm Cooling; Matrix Display\r\n6.5-liter and 27.8cm High Chassis, Desktop Gaming Redefined', 1, '1412.png'),
(11, 'Huawei P20', 499.99, 'Operador: Livre\r\nDual SIM: Sim, Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nTipo de SIM: Nano SIM\r\nRede: 4G LTE\r\nSistema Operativo: Android OS, v8.1 (Oreo)\r\nChipset: Hisilicon Kirin 970\r\nProcessador: Octa-core (4x2.4 GHz Cortex-A73 & 4x1.8 GHz Cortex-A53)\r\nGrÃ¡ficos: Mali-G72 MP12\r\nArmazenamento: 128GB\r\nMemÃ³ria RAM: 4GB\r\nEcrÃ£:\r\nTipo: Touchscreen capacitivo, LTPS IPS LCD, 16 MilhÃµes de Cores\r\nTamanho: 1080 x 2244 pixels, 5.8 polegadas (~432 ppi)\r\nProteÃ§Ã£o: Corning Gorilla Glass\r\nCÃ¢maras:\r\nCÃ¢mara traseira: Leica Dual Camera, Big Pixel 12MP RGB f1.8 + 20MP BW f1.6, 2x Hybrid Zoom, AIS, dual-tone LED\r\nFuncionalidades: Geo-tagging, touch focus, deteÃ§Ã£o de face/sorriso detection, panorama, HDR\r\nVÃ­deo: 1080p\r\nCÃ¢mara frontal: 24MP, f2.0\r\nDados:\r\nWLAN: Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, WiFi Direct, hotspot\r\nBluetooth: BT 4.2, aptXâ„¢, aptXâ„¢ HD, LDAC\r\nNFC: Sim\r\nUSB: v2.0, Type-C 1.0 reversÃ­vel\r\nSensores: Leitor de impressÃ£o digital (montado na frontal), acelerÃ´metro, giroscÃ³pio, proximidade, bÃºssola\r\nGPS: A-GPS, GLONASS\r\nBateria: NÃ£o removÃ­vel Li-Po 3400 mAh\r\nDimensÃµes: 149.1mm x 70.8mm x 7.65mm\r\nPeso: 165 g\r\n', 2, '23542.png'),
(12, 'Huawei P30', 699.99, 'Operador: Livre\r\nDual SIM: Sim, Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nTipo de SIM: Nano SIM\r\nRede: 4G LTE\r\nSistema Operativo: Android OS, v9 (Pie)\r\nChipset: Huawei Kirin 980 com Duplo NPU\r\nProcessador: Octa-core 2.6 GHz\r\nArmazenamento: 256GB - expansÃ­vel via cartÃ£o nanoSD (utilizando um dos Slots SIM)\r\nMemÃ³ria RAM: 8GB\r\nEcrÃ£:\r\nTipo: Touchscreen capacitivo, OLED, 16 MilhÃµes de Cores\r\nTamanho: 1080 x 2340 pixels, 6.47\" polegadas (~398 ppi)\r\nCÃ¢maras:\r\nCÃ¢mara traseira: 4 CÃ¢maras Leica, 40 MP (f/1.6 abertura) Grande Angular + 20 MP (f/2.2 abertura) Ultra Grande Angular + 8 MP (f/3.4 abertura) Zoom + HUAWEI Time-of-Flight(TOF)\r\nCÃ¢mara frontal: 32MP, (f2.0 abertura) powered by AI\r\nDados:\r\nWLAN: 802.11a/b/g/n/ac, 2.4Ghz & 5Ghz, WiFiDirect\r\nBluetooth: BT 5.0, BLE, aptX, aptXHD, LDAC HD e HWA Audio\r\nNFC: Sim\r\nUSB: Type-C | USB 3.1 Gen.1\r\nSensores: Leitor de impressÃ£o digital (no ecrÃ£), acelerÃ´metro, giroscÃ³pio, proximidade, bÃºssola\r\nGPS: A-GPS, GLONASS\r\nBateria: \r\nNÃ£o removÃ­vel Li-Po 4200 mAh\r\nCarregamento Super RÃ¡pido 2.0 (0% aos 70% em 30minutos)\r\nDimensÃµes: 158mm x 73.4mm x 8.41mm\r\nPeso: 192 g', 2, '19447.png'),
(13, 'Honor 9 Lite', 199.99, 'Operador: Livre\r\nDual SIM: Sim, Dual SIM (Nano-SIM, dual stand-by)\r\nRede: 2G / 3G / 4G\r\nSistema Operativo: Android 8.0 (Oreo)\r\nChipset: HiSilicon Kirin 659 (16 nm)\r\nProcessador: Octa-core (4x2.36 GHz Cortex-A53 & 4x1.7 GHz Cortex-A53)\r\nGrÃ¡ficos: Mali-T830 MP2\r\nArmazenamento: 32GB (espaÃ§o utilizÃ¡vel serÃ¡ inferior) - expansÃ­vel via microSD (utilizando um dos slots SIM)\r\nMemÃ³ria RAM: 3GB\r\nEcrÃ£:\r\nTipo: Touchscreen capacitivo IPS LCD 16 MilhÃµes de Cores\r\nTamanho: 1080 x 2160 pixels, 5.65 polegadas (~428 ppi)\r\nCÃ¢maras:\r\nCÃ¢mara traseira: 13 MP, PDAF + 2 MP, depth sensor\r\nFuncionalidades: Dual-LED flash, HDR, panorama\r\nVÃ­deo: 1080p@30fps\r\nCÃ¢mara frontal: 13 MP + 2 MP, depth sensor\r\nDados:\r\nWLAN: Wi-Fi 802.11 b/g/n, Wi-Fi Direct, hotspot\r\nBluetooth: 4.2, A2DP, LE\r\nUSB: microUSB 2.0, USB On-The-Go\r\nSensores: ImpressÃ£o digital (montada na traseira), acelerÃ´metro, proximidade, bÃºssola\r\nGPS: Sim, com suporte A-GPS, GLONASS, BDS\r\nBateria: NÃ£o removÃ­vel Li-Po 3000 mAh\r\nDimensÃµes: 151 x 71.9 x 7.6 mm\r\nPeso: 149 g', 2, '16749.png'),
(14, 'Iphone XS', 1199.99, 'Operador: Livre\r\nDual SIM: Sim, Dual SIM (nanoâ€‘SIM e eSIM)\r\nRede: 4G LTE\r\nSistema Operativo: Apple iOS\r\nChipset: Apple A12 Bionic\r\nProcessador: Hexa-core\r\nGrÃ¡ficos: Apple GPU (4-core graphics)\r\nArmazenamento: 256GB\r\nMemÃ³ria RAM: 4GB\r\nEcrÃ£:\r\nEcrÃ£ Super Retina HD\r\nEcrÃ£ OLED Multiâ€‘Touch integral de 5,8 polegadas (diagonal)\r\nEcrÃ£ HDR\r\nResoluÃ§Ã£o de 2436x1125 pÃ­xeis a 458 ppp\r\nRelaÃ§Ã£o de contraste 1 000 000:1 (normal)\r\nCÃ¢mara:\r\nDuas cÃ¢maras grande angular e teleobjetiva de 12 MP\r\nGrande angular: abertura de Æ’/1,8\r\nTeleobjetiva: abertura de Æ’/2,4\r\nZoom Ã³tico a 2x; zoom digital atÃ© 10x\r\nModo Retrato com efeito bokeh (fundo desfocado) avanÃ§ado e Controlo da Profundidade\r\nIluminaÃ§Ã£o de Retrato com cinco efeitos (Natural, EstÃºdio, Contorno, Palco, Palco mono)\r\nDupla estabilizaÃ§Ã£o Ã³tica de imagem\r\nObjetiva de seis elementos\r\nFlash True Tone quad-LED com sincronizaÃ§Ã£o lenta\r\nFotoÂ­grafias panorÃ¢micas (atÃ© 63 MP)\r\nCobertura da objetiva em cristal de safira\r\nSensor retroiluminado\r\nFiltro de IV hÃ­brido\r\nFocagem automÃ¡tica com Focus Pixels\r\nFocagem por toque com Focus Pixels\r\nHDR inteligente para fotografias\r\nFotos e Live Photos com vasta gama de cores\r\nMapeamento local de tons\r\nCorreÃ§Ã£o avanÃ§ada do efeito de olhos vermelhos\r\nControlo de exposiÃ§Ã£o\r\nEstabilizaÃ§Ã£o de imagem automÃ¡tica\r\nModo contÃ­nuo\r\nModo de temporizador\r\nGeolocalizaÃ§Ã£o de fotografias\r\nFormatos de imagem captados: HEIF e JPEG\r\nGravaÃ§Ã£o de vÃ­deo:\r\nGravaÃ§Ã£o de vÃ­deo 4K a 24, 30 ou 60 fps\r\nGravaÃ§Ã£o de vÃ­deo 1080p HD a 30 ou 60 fps\r\nGravaÃ§Ã£o de vÃ­deo 720p HD a 30 fps\r\nGama dinÃ¢mica expandida para vÃ­deos atÃ© 30 fps\r\nEstabilizaÃ§Ã£o Ã³tica de imagem para vÃ­deo\r\nZoom Ã³tico a 2x; zoom digital atÃ© 6x\r\nFlash True Tone quad-LED\r\nCompatiÂ­bilidade com vÃ­deo em cÃ¢mara lenta para 1080p a 120 ou 240 fps\r\nVÃ­deo time-lapse com estabilizaÃ§Ã£o\r\nEstabilizaÃ§Ã£o de vÃ­deo cinematogrÃ¡fica (1080p e 720p)\r\nVÃ­deo com focagem automÃ¡tica contÃ­nua\r\nFotoÂ­grafias de 8 MP e vÃ­deo 4K em simultÃ¢neo\r\nZoom durante a leitura de vÃ­deo\r\nGeolocalizaÃ§Ã£o de vÃ­deos\r\nFormatos de vÃ­deo gravados: HEVC e H.264\r\nGravaÃ§Ã£o em estÃ©reo\r\nCÃ¢mara TrueDepth:\r\nCÃ¢mara de 7 MP\r\nAbertura de Æ’/2,2\r\nModo Retrato com efeito bokeh (fundo desfocado) avanÃ§ado e Controlo da Profundidade\r\nIluminaÃ§Ã£o de Retrato com cinco efeitos (Natural, EstÃºdio, Contorno, Palco, Palco mono)\r\nAnimoji e Memoji\r\nGravaÃ§Ã£o de vÃ­deo 1080p HD a 30 ou 60 fps\r\nHDR inteligente para fotografias\r\nGama dinÃ¢mica expandida para vÃ­deos a 30 fps\r\nEstabilizaÃ§Ã£o de vÃ­deo cinematogrÃ¡fica (1080p e 720p)\r\nFotos e Live Photos com vasta gama de cores\r\nRetina Flash\r\nSensor retroiluminado\r\nEstabilizaÃ§Ã£o de imagem automÃ¡tica\r\nModo contÃ­nuo\r\nControlo de exposiÃ§Ã£o\r\nModo de temporizador\r\nDados:\r\nWLAN: Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth: 5.0, A2DP, LE\r\nSensores: Face ID, acelerÃ´metro, giroscÃ³pio, proximidade, bÃºssola, barÃ´metro\r\nGPS: Sim com suporte A-GPS, GLONASS, GALILEO, QZSS\r\nBateria: NÃ£o removÃ­vel Li-Ion\r\nDimensÃµes: 143.6 x 70.9 x 7.7 mm\r\nPeso: 177 g\r\n', 2, '19044.png'),
(15, 'Placa GrÃ¡fica Gigabyte GeForce RTX 2060 SUPER ', 459, 'Motor GrÃ¡fico: NVIDIAÂ® GeForceÂ® RTX 2060 SUPER\r\nBus: PCI Express x16 3.0\r\nClock GPU: Base: 1470 MHz, Boost: 1650 MHz\r\nClock de MemÃ³ria: 14000 MHz\r\nNÃºcleos CUDA: 2176\r\nMemÃ³ria: 8GB GDDR6\r\nInterface de MemÃ³ria: 256 Bits\r\nInterface I/O:\r\n3 x DisplayPort (v1.4)\r\n1 x HDMI 2.0b\r\nSuporte HDCP 2.2\r\nVersÃ£o DirectX: 12\r\nVersÃ£o OpenGL: 4.5\r\nDimensÃµes do produto: L=265 W=121 H=40 mm', 4, '29388.png'),
(16, 'Motherboard ATX ASRock X570 Phantom Gaming 4S', 159.9, 'Suporta CPUs AMD Soquete AM4 SÃ©rie Ryzenâ„¢ 2000 e 3000\r\nSuporta DDR4 4600+ (OC)\r\n2 PCIe 4.0 x16, 2 PCIe 4.0 x1, 1 M.2(Key E) Para o WiFi\r\nAMD Quad CrossFireXâ„¢ e CrossFireXâ„¢\r\nOpÃ§Ãµes de SaÃ­da de VÃ­deo: HDMI\r\nÃudio HD 7.1 Canais (Codec de Ãudio Realtek ALC1200), Capacitores de Ãudio ELNA\r\n8 SATA3, 1 Hyper M.2 (PCIe Gen4 x4 & SATA3), 1 Hyper M.2 (PCIe Gen4 x4)\r\n12 USB 3.2 Gen1 (4 frontais, 8 traseiras)\r\nRede Gigabit Intel\r\nASRock Polychrome SYNC\r\nArmadura de Jogos\r\n\r\nMemoria\r\n- 15Î¼ de Ouro nos Contatos dos Slots DIMM\r\nPlaca VGA\r\n- 15Î¼ de Ouro nos Contatos no Slot VGA PCIe (PCIE1)\r\nRede Internet\r\n- Rede Intel\r\nRefrigeraÃ§Ã£o\r\n- Dissipador XXL Aluminum Alloy\r\nRecursos Ãšnicos\r\n\r\nASRock Super Alloy\r\n- Bobina de Energia 50A Premium\r\n- PCB Black Safira\r\n- PCB de Fibra de Vidro de Alta Densidade\r\nSlot de AÃ§o ASRock Gen4\r\nASRock Hyper M.2 (PCIe Gen4x4 & SATA3)\r\nASRock Checagem de Status do Post (PSC)\r\nASRock Full Spike Protection (para todas as Portas USB, de Ãudio, de Rede)\r\nLive Update & APP Shop ASRock\r\nCPU\r\n\r\n- Suporta CPUs AMD Soquete AM4 SÃ©rie Ryzenâ„¢ 2000 e 3000\r\n - Design Power Phase 8\r\nChipset\r\n\r\nAMD X570\r\nMemÃ³ria\r\n\r\n- Tecnologia de memÃ³ria DDR4 Dual Channel\r\n- 4 x slots DDR4 DIMM\r\n- CPUs AMD sÃ©rie Ryzen (Matisse) suportam memÃ³ria DDR4 4600+(OC) / 4533(OC) / 4466(OC) / 4400(OC) / 4300(OC) / 4266(OC) / 4200(OC) / 4133(OC) / 4000(OC) / 3866(OC) / 3800(OC) / 3733(OC) / 3600(OC) / 3466(OC) / 3200 / 2933 / 2667 / 2400 / 2133 ECC & nÃ£o-ECC, sem-buffer*\r\n- CPUs AMD sÃ©rie Ryzen (Pinnacle Ridge) suportam memÃ³ria DDR4 3466+(OC) / 3200(OC) / 2933 / 2667 / 2400 / 2133 ECC & nÃ£o-ECC, sem-buffer*\r\n- CPUs AMD sÃ©rie Ryzen (Picasso) suportam memÃ³ria DDR4 3466+(OC) / 3200(OC) / 2933 / 2667 / 2400 / 2133 nÃ£o-ECC, sem-buffer*\r\n- Capacidade mÃ¡xima de memÃ³ria do sistema: 128GB**\r\n- 15Î¼ de Ouro nos Contatos dos Slots DIMM\r\n \r\n\r\n*Para CPUs da SÃ©rie Ryzen (Picasso), o ECC Ã© suportado apenas com CPUs PRO.\r\n\r\n**Devido a limitaÃ§Ãµes do sistema operacional, o tamanho da memÃ³ria pode ser menor que 4GB para a reserva de uso do sistema no WindowsÂ® 32-bit. No WindowsÂ® 64-bit com CPU de 64-bit, nÃ£o existe esta limitaÃ§Ã£o.\r\n\r\n \r\n\r\nBIOS\r\n\r\n- BIOS de 256Mb AMI UEFI Legal com Interface GrÃ¡fica\r\n- Suporta \"Plug e Play\"\r\n- CompatÃ­vel com eventos de despertar ACPI 5.1\r\n- Suporta jumperfree\r\n- Suporta SMBIOS 2.3\r\n- CPU, CPU VDDCR_SOC, DRAM, VPPM, PREM VDD_CLDO, PERM VDDCR_SOC, +1.8V, VDDP, VDDG, CPU Load-Line Calibration, Multi-ajuste de Voltage CPU VDDCR_SOC Load-Line Calibration\r\nGrÃ¡ficos\r\n\r\n- GrÃ¡ficos AMD Radeonâ„¢ SÃ©rie Vega integrados nas APUs SÃ©rie Ryzen*\r\n- DirectX 12, Pixel Shader 5.0\r\n- MemÃ³ria compartilhada padrÃ£o de 2GB. MemÃ³ria compartilhada mÃ¡xima suporta atÃ© 16GB.**\r\n- Suporta HDMI 2.0 com resoluÃ§Ã£o mÃ¡xima de 4K x 2K (4096x2160) @ 60Hz\r\n- Suporta Sincronismo AutomÃ¡tico de LÃ¡bios, Cores Profundas (12bpc), xvYCC e HBR (High Bit Rate Audio / Ãudio de Alto Bit Rate) com HDMI 2.0 (Monitor HDMI compatÃ­vel necessÃ¡rio)\r\n-        Suporta HDR (High Dynamic Range) com HDMI 2.0\r\n\r\n- Suporta HDCP 2.2 com a porta HDMI 2.0\r\n- Suporta reproduÃ§Ã£o 4K Ultra HD (UHD) com as portas HDMI 2.0\r\n- Suporta MicrosoftÂ® PlayReady\r\n \r\n\r\n*O suporte pode variar dependendo da CPU\r\n\r\n**A memÃ³ria mÃ¡xima compartilhada de 16GB requer 32GB de memÃ³ria instalada no sistema.\r\n\r\nÃudio\r\n\r\n- Ãudio HD 7.1 Canais com ProteÃ§Ã£o de ConteÃºdo (Codec de Ãudio Realtek ALC1200)\r\n- Suporte Ãudio Blu-ray Premium\r\n- Suporta Surge Protection\r\n- Capacitores de Ãudio ELNA\r\n- ProteÃ§Ã£o de Isolamento do PCB\r\n- Camadas do PCB Individuais para os Canais E/D de Ãudio\r\nRede\r\n\r\nGigabit LAN 10/100/1000 Mb/s\r\nGiga PHY IntelÂ® I211AT\r\n- Suporta Wake-On-LAN\r\n- Suporta ProteÃ§Ã£o Contra Raios/ESD\r\n- Suporta Eficiencia de Energia Ethernet 802.3az\r\n- Suporta PXE\r\nSlots\r\n\r\nCPUs AMD sÃ©rie Ryzen (Matisse)\r\n- 2 x slots PCI Express 4.0 x16 (PCIE1/PCIE3: um a x16 (PCIE1); duplo a x16 (PCIE1) / x4 (PCIE3))*\r\nCPUs AMD sÃ©rie Ryzen (Pinnacle Ridge)\r\n- 2 x slots PCI Express 3.0 x16 (PCIE1/PCIE3: um a x16 (PCIE1); duplo a x16 (PCIE1) / x4 (PCIE3))*\r\nCPUs AMD sÃ©rie Ryzen (Picasso)\r\n- 2 x slots PCI Express 3.0 x16 (PCIE1/PCIE3: um a x8 (PCIE1); duplo a x8 (PCIE1) / x4 (PCIE3))*\r\n- 2 x slots PCI Express 4.0 x1\r\n- Suporta AMD Quad CrossFireXâ„¢ e CrossFireXâ„¢\r\n- 1 x Soquete M.2 (Key E), suporta mÃ³dulo WiFi/BT tipo 2230\r\n- 15Î¼ de Ouro nos Contatos no Slot VGA PCIe (PCIE1)\r\n \r\n\r\n*SSD NVMe como discos de boot\r\n\r\nArmazenamento\r\n\r\n- 8 x conectores SATA3 6.0 Gb/s, suportando RAID (RAID 0, RAID 1 e RAID 10), NCQ, AHCI e Hot Plug\r\n- 1 x Soquete Hyper M.2 (M2_1), suporta mÃ³dulo M.2 PCIe M Key tipo 2280/22110 atÃ© Gen4x4 (64 Gb/s) (com CPU Matisse) ou Gen3x4 (32 Gb/s) (com CPU Pinnacle Ridge e Picasso)*\r\n- 1 x Soquete Hyper M.2 (M2_3), suporta mÃ³dulos M Key 2280/22110 M.2 SATA3 6.0 Gb/s e mÃ³dulos M.2 PCIe atÃ© Gen4x4 (64 Gb/s) (com CPU Matisse) ou Gen3x4 (32 Gb/s) (com CPU Pinnacle Ridge e Picasso)*\r\n \r\n\r\n*Se o suporte a Thunderboltâ„¢ estiver ativado, M.2 do tipo SATA serÃ¡ desabilitado.\r\n\r\nSSD NVMe como discos de boot\r\n\r\nSuporta ASRock U.2 Kit\r\n\r\nSuporta RAID 0/1/10\r\n\r\nConectores\r\n\r\n- 1 x conector para COM\r\n- 1 x Conector SPI TPM\r\n- 1 x Conector de Speaker e Power LED\r\n- 2 x Conectores RGB LED*\r\n- 1 x Conector de LED EndereÃ§Ã¡vel**\r\n- 1 x conector de VentoÃ­nha da CPU (4-pin)***\r\n- 1 x Conector de Ventoinha de CPU/Bomba de Ãgua (4-pin) (Controle de Velocidade de Ventoinhas Inteligente)****\r\n- 3 x Conectores de Ventoinha de Gabinete/Bomba Dâ€™Ã¡gua (4-pin) (Controle de Velocidade de Ventoinhas Inteligente)*****\r\n- 1 x Conector de energia ATX 24 pinos\r\n- 1 x Conector de Energia 12V 8 pinos\r\n- 1 x Conector de painel de Ã¡udio frontal\r\n- 1 x Conector USB de Ventoinha de LED AMD\r\n- 1 x Conector Thunderboltâ„¢ AIC (5-pin) (Suporta apenas Placa ASRock Thunderboltâ„¢ AIC R2.0)\r\n- 1 x Conector USB 2.0 (suporta 2 portas USB 2.0) (Suporta ProteÃ§Ã£o Contra ESD)\r\n- 2 x conectores USB 3.2 Gen1 (suportando 4 portas USB 3.2 Gen1) (Suporta ProteÃ§Ã£o Contra ESD)\r\n*Suporta Fita de LED de atÃ© 12V/3A, 36W no total\r\n\r\n**Suporta Fita de LED de atÃ© 5V/3A, 15W no total\r\n\r\n***O Conector de Ventoinha da CPU suporta a ventoinha da CPU com potÃªncia mÃ¡xima de 1A (12W).\r\n\r\n****O conector de Ventoinha de CPU Opcional/Bomba de Ãgua suporta ventoinha de water cooler de no mÃ¡ximo 2A (24W).\r\n\r\n*****O Conector de Ventoinha de Gabinete/Bomba Dâ€™Ã¡gua suporta ventoinha de water cooler de no mÃ¡ximo 2A (24W).\r\nCPU_FAN2/WP, CHA_FAN1/WP, CHA_FAN2/WP e CHA_FAN3/WP podem detectar automaticamente se uma ventoinha de 3-pinos ou 4-pinos estÃ¡ em uso.\r\n\r\nPainel Traseiro\r\n\r\n- 1 x Porta de Mouse / Teclado PS/2\r\n- 1 x Porta HDMI\r\n- 8 x portas USB 3.2 Gen1 (Suporta ProteÃ§Ã£o Contra ESD)\r\n- 1 x Porta de Rede RJ-45 com LED (LED de ACESSO E LED de VELOCIDADE)\r\n- conectores de Ãudio HD: Entrada de Linha / Alto-Falante Frontal / Microfone\r\nSoftware e UEFI\r\n\r\nSoftware\r\nASRock Phantom Gaming Tuning\r\nASRock Polychrome SYNC\r\nASRock Key Master\r\nASRock XFast LAN\r\nUEFI\r\nUEFI Full HD ASRock\r\n-ASRock Instant Flash\r\n *Estes utilitÃ¡rios podem ser baixados na APP Shop.\r\n\r\nCD de Suporte\r\n\r\n- Drivers, UtilitÃ¡rios, AntiVirus (VersÃ£o Trial), Barra de Tarefas e Navegador Google Chrome\r\nAcessÃ³rios\r\n\r\n- Guia RÃ¡pido de InstalaÃ§Ã£o, CD de Suporte, Protetor E/S\r\n- 2 x Cabos de dados SATA\r\n- 3 x Parafusos Para Soquetes M.2\r\nMonitor de Hardware\r\n\r\n- Sensor de Temperatura: CPU, CPU/Bomba de Ãgua, Gabinete, Gabinete/Ventoinhas da Bomba de Ãgua\r\n- TacÃ´metro de Ventoinha: CPU, CPU/Bomba de Ãgua, Gabinete, Gabinete/Ventoinhas da Bomba de Ãgua\r\n- Quiet Fan (Ajuste automÃ¡tico das ventoinhas do gabinete de acordo com a temperatura do CPU): CPU, CPU/Bomba de Ãgua, Gabinete, Gabinete/Ventoinhas da Bomba de Ãgua\r\n- Controle Multivelocidade de Ventoinha: CPU, CPU/Bomba de Ãgua, Gabinete, Gabinete/Ventoinhas da Bomba de Ãgua\r\n- Monitoramento de Voltagem: +12V, +5V, +3.3V, CPU Vcore, CPU VDDCR_SOC, DRAM, PREM VDDCR_SOC, +1.8V, VDDP\r\nFormato\r\nFormato ATX: 12.0-in x 9.0-in, 30.5 cm x 22.9 cm\r\nDesign com Capacitores SÃ³lidos\r\nSO\r\n\r\n- MicrosoftÂ® WindowsÂ® 10 64-bit\r\nCertificaÃ§Ãµes\r\n\r\n- FCC, CE\r\n- Pronta para ErP/EuP (NecessÃ¡rio fonte de alimentaÃ§Ã£o pronta para ErP/EuP)', 4, '14613.png'),
(17, 'Placa GrÃ¡fica Zotac GeForce GTX 1650', 159.99, 'Motor GrÃ¡fico: NVIDIAÂ® GeForceÂ® GTX 1650\r\nBus: PCI Express x16 3.0\r\nNÃºcleos CUDA: 896\r\nMemÃ³ria: 4GB GDDR5\r\nClock de MemÃ³ria: 8Gbps\r\nClock GPU: Clock Base: 1485 MHz / Clock Boost: 1725 MHz\r\nInterface de MemÃ³ria: 128 Bits\r\nInterface I/O:\r\n1 x DisplayPort 1.4\r\n1 x HDMI 2.0b\r\n1 x Dual Link DVI-D\r\nSuporte HDCP 2.2\r\nVersÃ£o DirectX: 12\r\nVersÃ£o OpenGL: 4.5\r\nDimensÃµes do produto: 162.4mm x 111.15mm x 37.1mm', 4, '25642.jpg'),
(18, 'Placa GrÃ¡fica MSI Radeon RX 5600 XT Mech OC 6G', 324.99, 'Motor GrÃ¡fico: AMD Radeonâ„¢ RX 5600 XT\r\nBus: PCI Express 4.0\r\nMemÃ³ria: 6GB GDDR6\r\nClock GPU:\r\nBoost: AtÃ© 1620 MHz\r\nGame: AtÃ© 1460 MHz\r\nBase: 1235 MHz\r\nStream Processors: 2304\r\nClock de MemÃ³ria: 12 Gbps\r\nInterface de MemÃ³ria: 192 Bits\r\nInterface:\r\n3 x DisplayPort 1.4\r\n1 x HDMI 2.0b\r\nSuporte HDCP: Sim\r\nDimensÃµes do Produto: 231 x 127 x 46 mm\r\nPeso do produto: 790 g', 4, '21585.jpg'),
(19, 'Placa GrÃ¡fica MSI Radeon RX 5600 XT Gaming X 6G', 379.99, 'Motor GrÃ¡fico: AMD Radeonâ„¢ RX 5600 XT\r\nBus: PCI Express 4.0\r\nMemÃ³ria: 6GB GDDR6\r\nClock GPU:\r\nBoost: AtÃ© 1750 MHz\r\nGame: AtÃ© 1615 MHz\r\nBase: 1420 MHz\r\nStream Processors: 2304\r\nClock de MemÃ³ria: 12 Gbps\r\nInterface de MemÃ³ria: 192 Bits\r\nInterface:\r\n3 x DisplayPort 1.4\r\n1 x HDMI 2.0b\r\nSuporte HDCP: Sim\r\nDimensÃµes do Produto: 297 x 58 x 140 mm\r\nPeso do produto: 1401 g', 4, '7466.jpg'),
(20, 'Processador Intel Celeron G4930 Dual-Core 3.2GHz', 46.99, 'NÂº NÃºcleos: 2\r\nNÂº Threads: 2\r\nFrequÃªncia Clock: 3.2 GHz\r\nIntelÂ® Smart Cache: 2 MB\r\nLitografia: 14 nm\r\nTDP MÃ¡x.: 54 W\r\nGrÃ¡ficos Embutidos: Intel UHD Graphics 610', 4, '26395.jpg'),
(21, 'Monitor BenQ EW2780 IPS 27\" FHD 16:9 60Hz FreeSync', 199.99, 'EcrÃ£:\r\nTamanho do painel: 27 polegadas\r\nTipo de painel: IPS\r\nRetroiluminaÃ§Ã£o: LED\r\nResoluÃ§Ã£o: 1920x1080\r\nBrilho: 250 nits\r\nContraste nativo: 1000:1\r\nContraste dinÃ¢mico: 20,000,000:1\r\nÃ‚ngulos de visualizaÃ§Ã£o (L/R;U/D) (CR>=10): 178/178\r\nTempo de resposta: 5ms (GTG)\r\nTaxa de atualizaÃ§Ã£o: 60Hz\r\nRelaÃ§Ã£o de aspecto: 16:9\r\nReproduÃ§Ã£o de cores: 16.7 milhÃµes de cores\r\nGama de cores: 72% NTSC\r\nÃudio:\r\nColunas integras: Sim, 2 x 2.5W\r\nHeadphone Jack: Sim\r\nConectividade:\r\n3 x HDMI 2.0\r\nSuporte HDCP\r\nConsumo energÃ©tico:\r\nClassificaÃ§Ã£o de tensÃ£o: 100 - 240V\r\nConsumo de energia: 35W\r\nAjustabilidade suporte:\r\nInclinaÃ§Ã£o (para baixo / para cima): -5Ëš - 20Ëš\r\nNorma VESA: 100 x 100 (mm)\r\nDimensÃµes do produto: 457.3 x 609.9 x 186.5 mm\r\nPeso do produto: 4.4 kg', 5, '15271.jpg'),
(22, 'Cadeira Gaming Asus ROG Chariot Core Chair', 499.99, 'EspecificaÃ§Ãµes:\r\nAlmofada para a cabela: Espuma ViscoelÃ¡stica\r\nApoio lombar: Espuma ViscoelÃ¡stica\r\nEstofo: Pele sintÃ©tica\r\nMoldura: AÃ§o\r\nBase: AlumÃ­nio\r\nTipo de espuma: 4D\r\nBloqueio: Espuma de alta densidade polarizada a frio\r\nRodas: 64mm revestidas a pele sintÃ©tica\r\nApoio de cabeÃ§a ajustÃ¡vel: AtÃ© 145Âº\r\nApoios para braÃ§os ajustÃ¡veis: Em 4 direÃ§Ãµes\r\nAmortecedor a gÃ¡s: Amortecedor a GÃ¡s de Classe 4 Ã  prova de explosÃ£o\r\nInclinaÃ§Ã£o: AtÃ© 15Âº\r\nCarga mÃ¡xima: 120 kg\r\nAltura recomendada: 165 - 195 cm', 6, '30804.jpg'),
(23, 'Monitor HP EliteDisplay S270n IPS 27\" 4K UHD 16:9 60Hz', 349.99, 'Tamanho do ecrÃ£: 27\"\r\nResoluÃ§Ã£o: 3840 x 2160\r\nProporÃ§Ã£o: 16:9\r\nTipo do ecrÃ£: IPS\r\nTempo de resposta: 5.4 ms (cinzento para cinzento)\r\nLuminosidade: 350 g/mÂ²\r\nRelaÃ§Ã£o de contraste: 5M:1 (min) /10M:1 (tÃ­pico)\r\nTaxa de atualizaÃ§Ã£o: 60Hz\r\nReproduÃ§Ã£o de cores: AtÃ© 1,07 bilhÃ£o de cores com o uso da tecnologia FRC\r\nGama de cores: >99% sRGB\r\nConectividade:\r\n1 x HDMI 1 (2.0)\r\n1 x HDMI 1 (1.4)\r\n1 x DisplayPort (1.2)\r\n1 x USB Type-C (O USB Type-Câ„¢ suporta DisplayPort 1.2â„¢ e fornecimento de energia de atÃ© 60 W)\r\nConsumo energÃ©tico: 126 W (mÃ¡ximo), 55 W (tÃ­pico), 0,5 W (em modo de espera)\r\nAjustabilidade: InclinaÃ§Ã£o: -5Â° a +23Â°\r\nDimensÃµes: 61.35 x 18.99 x 49.85 cm\r\nPeso: 6.14 kg\r\nConteÃºdo da Embalagem:\r\nMonitor HP EliteDisplay S270n\r\nCabo de alimentaÃ§Ã£o CA (1,9 m)\r\nCabo HDMI (1,8 m)\r\nCabo USB Type-Câ„¢ (1,8 m)\r\nCabo DP (1,8 m)', 5, '1021.jpg'),
(24, 'Monitor LG 27UK670-B IPS 27\" 4K UHD 16:9 60Hz FreeSync', 429.99, 'Tamanho do ecrÃ£: 27\"\r\nResoluÃ§Ã£o: 3840 x 2160\r\nTaxa de atualizaÃ§Ã£o: 60 Hz\r\nTipo de painel: IPS\r\nTempo de resposta: 5ms \r\nContraste: 700:1 (Min.), 1000:1 (Typ.)\r\nBrilho: 300cd (Typ.) / 240cd (Min.)\r\nRelaÃ§Ã£o de aspecto: 16:9\r\nÃ‚ngulos de visÃ£o: 178Ëš(R/L), 178Ëš(U/D)\r\nReproduÃ§Ã£o de cor: 1.07 BiliÃµes\r\nGama de cor: sRGB 99% (CIE1931) \r\nConectividade:\r\n2 x HDMI\r\n1 x DisplayPort\r\n1 x USB Type-C\r\n1 x Jack 3.5mm\r\nSuporte HDCP\r\nAjustabilidade:\r\nAjuste em altura\r\nAjuste em inclinaÃ§Ã£o\r\nAjuste em articulaÃ§Ã£o\r\nPivot\r\nConsumo energÃ©tico:\r\nConsumo tÃ­pico: 41W\r\nConsumo mÃ¡ximo: 98W\r\nPower Save/Sleep Mode: < 0.5W\r\nNorma VESA: 100 x 100 mm\r\nDimensÃµes do produto (com base): 613.2 x 251 x 527.3 mm\r\nDimensÃµes do produto (sem base): 613.2 x 44.6 x 364.5 mm\r\nPeso do produto (com base): 7.0 kg\r\nPeso do produto (sem base): 4.8 kg', 5, '30962.jpg'),
(25, 'Monitor BenQ Zowie XL2746S TN 27\" FHD 16:9 240Hz FreeSync', 669.99, 'Tamanho ecrÃ£: 27\"\r\nRelaÃ§Ã£o de aspecto: 16:9\r\nResoluÃ§Ã£o: 1920 x 1080 a 240Hz (HDMI 2.0, DP)â€Žâ€Ž\r\nBrilho: 320cd/ãŽ¡\r\nContraste: 1000:1\r\nContraste dinÃ¢mico: 12M:1\r\nTipo de painel: TN\r\nTempo de resposta: 0.5ms (GtG)\r\nPortas I/O:\r\n1 x DVI-DL \r\n2 x HDMI\r\n1 x DisplayPort 1.2\r\nHeadphone jack\r\nMicrophone jackâ€Žâ€Žâ€Ž\r\nHub USB\r\nConsumo energÃ©tico: 55W\r\nAjustabilidade:\r\nPivot: Sim, 90Âº\r\nRotaÃ§Ã£o (esquerda / direita: Sim, 45 / 45\r\nInclinaÃ§Ã£o: Sim, -5Âº ~ 20Âº\r\nAjuste em altura: 140 mm\r\nNorma VESA: 100 x 100 mm\r\nDimensÃµes do produto: 558.8 (Highest) / 419.4 (Lowest) x 632.5 x 225.0 mm\r\nPeso do produto: 8.7 kg', 5, '27459.jpg'),
(26, 'Monitor Curvo LG 38GL950G-B IPS 37.5\" WQHD+ 21:9 175Hz G-SYNC', 1899.99, 'Tamanho do ecrÃ£: 37.5\"\r\nResoluÃ§Ã£o: 3840 x 1600\r\nTaxa de atualizaÃ§Ã£o: 144 Hz (175Hz com Overclock)\r\nTipo de painel: IPS\r\nTempo de resposta: 1ms (GtG at Faster)\r\nContraste: 700:1 (Min.), 1000:1 (Typ.)\r\nBrilho: 450cd (typ) / 360cd (Min)\r\nRelaÃ§Ã£o de aspecto: 21:9\r\nÃ‚ngulos de visÃ£o: 178Ëš(R/L), 178Ëš(U/D)\r\nReproduÃ§Ã£o de cor: 1.07 BiliÃµes\r\nGama de cor: DCI-P3 98% (CIE1976)\r\nConectividade:\r\n1 x HDMI\r\n1 x DisplayPort\r\n1 x Headphone Out\r\n1 x USB Up-stream\r\n2 x USB Down-stream\r\nSuporte HDCP\r\nAjustabilidade: \r\nAjuste em altura\r\nAjuste em inclinaÃ§Ã£o\r\nConsumo energÃ©tico:\r\nConsumo tÃ­pico: 85W\r\nConsumo mÃ¡ximo: 154W\r\nPower Save/Sleep Mode: < 0.5W\r\nNorma VESA: 100 x 100 mm\r\nDimensÃµes do produto (com base): 896.4 x 286.8 x 551.2 mm (up) / 896.4 x 286.8 x 441.2 mm (down)\r\nDimensÃµes do produto (sem base): 896.4 x 111.3 x 394.4 mm\r\nPeso do produto (com base): 10 kg\r\nPeso do produto (sem base): 7.6 kg', 5, '17856.jpg'),
(27, 'Monitor HP 24w IPS 23.8\" FHD 16:9 60Hz', 179.99, 'Tamanho do ecrÃ£: 60,45 cm (23,8 pol.)\r\nResoluÃ§Ã£o: 1920 x 1080\r\nProporÃ§Ã£o: 16:9\r\nTipo do ecrÃ£: IPS\r\nTempo de resposta: 5 ms (cinzento para cinzento)\r\nLuminosidade: 250 g/mÂ²\r\nRelaÃ§Ã£o de contraste: 1000:1 estÃ¡tico; 5M:1 dinÃ¢mico\r\nTaxa de atualizaÃ§Ã£o: 60Hz\r\nConectividade:\r\n1 x Porta HDMI\r\n1 x Porta VGA\r\nJack Headphone\r\nConsumo energÃ©tico: 23 W (mÃ¡ximo), 20 W (normal); Modo de suspensÃ£o: 0,5 W\r\nAjustabilidade: InclinaÃ§Ã£o: -5Â° a +23Â°\r\nDimensÃµes: 54,06 x 18,43 x 40,03 cm (com suporte); 54,06 x 50 x 32,25 cm (sem suporte)\r\nPeso: 3,58 kg (com suporte); 3,23 kg (sem suporte)', 5, '25337.jpg'),
(28, 'Cadeira Gaming Corsair T1 RACE 2018 Preta/Azul', 289.99, 'EspecificaÃ§Ãµes:\r\nTIpo de espuma assento: Espuma de poliuretano (espuma fria)\r\nDensidade da Espuma do Assento: 14kg/mÂ³ | 0.9lb/ftÂ³\r\nEstrutura de Assento ConstruÃ§Ã£o: Metal\r\nMaterial da superfÃ­cie do assento: Couro PU\r\nMaterial do encosto: Couro em PVC 3D\r\nBraÃ§os ajustÃ¡veis: sim\r\nTipo de BraÃ§o: 4D (Cima / Baixo, Esquerda / Direita, Frente / Verso, RotaÃ§Ã£o)\r\nInclinaÃ§Ã£o: sim\r\nTipo de mecanismo de inclinaÃ§Ã£o: Tipo bÃ¡sico (para cima / baixo, inclinado)\r\nÃ‚ngulo de inclinaÃ§Ã£o ajustÃ¡vel: 0-10 Â°\r\nBloqueio de inclinaÃ§Ã£o: sim\r\nClasse elevador: Classe 4\r\nReclinaÃ§Ã£o: sim\r\nÃ‚ngulo traseiro ajustÃ¡vel: 90-180Â°\r\nAjuste de altura: sim\r\nAltura mÃ¡xima do assento: 52cm\r\nAltura mÃ­nima do assento: 44cm\r\nAltura mÃ¡xima do braÃ§o: 38cm\r\nAltura MÃ­nima do BraÃ§o: 28cm\r\nAltura do Encosto: 95cm\r\nEncosto Largura do Ombro: 56cm\r\nTamanho do pacote: 88cm x 69cm x 35cm\r\nCapacidade de peso: 120kgs\r\nMaterial da base da cadeira: Nylon\r\nTamanho do assento: 56cm x 58cm', 6, '12862.jpg'),
(29, 'Cadeira Gaming Sharkoon ELBRUS 3 Vermelha', 259.99, 'EspecificaÃ§Ãµes:\r\nTipo de Espuma:: Molde de alta densidade feito de espuma\r\nDensidade de espuma: 53 - 57 kg/mÂ³\r\nConstruÃ§Ã£o da armaÃ§Ã£o:: AÃ§o\r\nMaterial da tampa do assento:: PU\r\nApoio para braÃ§os ajustÃ¡veis:: 3D\r\nMecanismo:: InclinaÃ§Ã£o convencional\r\nTrava da inclinaÃ§Ã£o: Sim\r\nÃ‚ngulo de inclinaÃ§Ã£o ajustÃ¡vel: 3Â° - 18Â°\r\nPistÃ£o de elevaÃ§Ã£o a gÃ¡s: Classe 4\r\nEstilo da parte traseira do assento: Parte de trÃ¡s alta\r\nÃ‚ngulo de inclinaÃ§Ã£o ajustÃ¡vel: 90Â° - 160Â°', 6, '30879.jpg'),
(30, 'Cadeira Gaming Alpha Gamer Osiris Preta/Branca', 249.99, 'Peso suportado: 135 Kg (mÃ¡x.)\r\nElevador: GÃ¡s (classe 4)\r\nEnchimento: Espuma 50 Kg / m3 (assento); 24 Kg / m3 (encosto)\r\nAjuste da cadeira: 9 cm (em altura)\r\nAjuste do encosto: posicionamento a 180Â° (mÃ¡x.)\r\nAjuste do apoio dos braÃ§os:\r\n7.5 cm em altura\r\n30Â° direita e esquerda na horizontal\r\n5 cm posicionamento frontal/traseiro\r\n2 cm posicionamento interior/exterior\r\nPeso: 28 Kg\r\nMateriais: Metal, plÃ¡stico, pele sintÃ©tica, camurÃ§a, espuma\r\nDimensÃµes (Encosto):\r\nLargura ombros: 49 cm\r\nLargura lombar: 29.5 cm\r\nAltura: 86 cm\r\nDimensÃµes (Assento):\r\nLargura: 31.5 cm\r\nComprimento: 48 cm\r\nAltura: 47 ~ 56 cm\r\nAltura da cadeira: 127 ~ 136 cm', 6, '32236.jpg'),
(31, 'Cadeira Gaming Alpha Gamer Astra Preta/Vermelha', 229.99, 'EspecificaÃ§Ãµes:\r\nPeso suportado: 125 Kg (mÃ¡x.)\r\nElevador: GÃ¡s (classe 4)\r\nEnchimento: Espuma 50 Kg / m3\r\nAjuste da cadeira: 9 cm (em altura)\r\nAjuste do encosto: posicionamento a 180Â° (mÃ¡x.)\r\nAjuste do apoio dos braÃ§os: 7.5 cm em altura / 10Â° direita e esquerda na horizontal / 6 cm posicionamento frontal/traseiro\r\nMateriais: Metal, plÃ¡stico, pele sintÃ©tica, espuma\r\nDimensÃµes (Encosto): Largura ombros: 57 cm / Largura lombar: 41 cm / Altura: 83 cm\r\nDimensÃµes (Assento): Largura: 38 cm / Comprimento: 57 cm / Altura: 48 ~ 57 cm\r\nPeso do produto: 22 Kg', 6, '13749.jpg'),
(32, 'Cadeira Gaming Alpha Gamer Pollux Preta/Vermelha', 199.99, 'EspecificaÃ§Ãµes:\r\nPeso suportado: 125 Kg (mÃ¡x.)\r\nElevador: GÃ¡s (classe 4)\r\nEnchimento: Espuma 50 Kg / m3\r\nAjuste da cadeira: 9 cm (em altura)\r\nAjuste do encosto: posicionamento a 180Â° (mÃ¡x.)\r\nAjuste do apoio dos braÃ§os: 9 cm em altura\r\nMateriais: Metal, plÃ¡stico, pele sintÃ©tica, espuma\r\nDimensÃµes (Encosto): Largura ombros: 57 cm / Largura lombar: 53 cm / Altura: 88 cm\r\nDimensÃµes (Assento): Largura: 41 cm / Comprimento: 52 cm / Altura: 48 ~ 57 cm\r\nPeso do produto: 20.5 Kg', 6, '13386.jpg'),
(33, 'MSI Infinite 7RB-068XEU OC', 649, 'Sistema Operativo:\r\nSistema Operativo nÃ£o incluÃ­do\r\nPoderÃ¡ adquirir aqui o seu Sistema Operativo\r\nProcessador: IntelÂ® Coreâ„¢ i5-7400 Quad-Core, 3.00 GHz com Turbo atÃ© 3.50 GHz, 6 MB Cache\r\nChipset: IntelÂ® H110\r\nGrÃ¡ficos: IntelÂ® HD Graphics 630 + MSI GeForce GTX 1050 Ti 4GT OCV1\r\nMemÃ³ria RAM: 8GB DDR4 2400MHz\r\nArmazenamento: HDD 1TB\r\nPortas I/O Frontais:\r\n1 x USB 3.1 Gen1 Type C\r\n1 x USB 3.1 Gen1 Type A\r\n1 x USB 2.0\r\nPortas I/O Traseiras:\r\n1 x USB 3.1 Gen1 Type C\r\n1 x USB 3.1 Gen1 Type A\r\n4 x USB 2.0\r\n1 x HDMI\r\n1 x RJ45\r\n1 x Audio connector\r\n1 x PS/2\r\nComunicaÃ§Ãµes:\r\nWireless IntelÂ® AC3168 + Bluetooth 4.2\r\nLAN Intel WGI219V\r\nDimensÃµes do produto: 210 x 488 x 450 (mm)\r\nPeso do produto: 13 kg', 1, '32699.jpg'),
(34, 'Rato Ã“ptico Asus ROG Gladius II Origin PNK LTD 12000DPI Rosa', 89.99, 'EspecificaÃ§Ãµes:\r\nSensor: Ã“ptico\r\nResoluÃ§Ã£o: 12000dpi\r\nInterface: USB\r\nDimensÃµes: L 126 x W 67 x H 45 mm\r\nPeso: 110 g\r\n\r\nConteÃºdo da Embalagem:\r\nRato Asus ROG Gladius II\r\nCabo USB tranÃ§ado de 2 metros\r\nCabo USB de borracha de 1 metro\r\n2 x switches Omron feitos no JapÃ£o\r\n1 x bolsa ROG\r\nEtiqueta de logotipo ROG', 3, '10195.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtostatus`
--

DROP TABLE IF EXISTS `produtostatus`;
CREATE TABLE IF NOT EXISTS `produtostatus` (
  `id` int(11) NOT NULL,
  `STATUS` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtostatus`
--

INSERT INTO `produtostatus` (`id`, `STATUS`) VALUES
(1, 'Disponivel'),
(2, 'Indisponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userpagamento`
--

DROP TABLE IF EXISTS `userpagamento`;
CREATE TABLE IF NOT EXISTS `userpagamento` (
  `id` int(11) NOT NULL,
  `metodopagamento_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `formapagamento` varchar(45) DEFAULT NULL,
  `creditcard` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metodopagamento_idx` (`metodopagamento_id`),
  KEY `users_idx` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `phone`, `morada`, `pais`, `cidade`, `codigopostal`) VALUES
(1, 'Archer', 'joaocunha@epad.edu.pt', '123456', 'JoÃ£o Edgar Pinto', '969053098', 'Rua dos Bombeiros VoluntÃ¡rios, nÂº18, 1ÂºFrente', 'Portugal', 'Lisboa', '2675-304');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
