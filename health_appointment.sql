-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 12:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminName` varchar(30) NOT NULL,
  `adminEmail` varchar(30) NOT NULL,
  `adminPw` varchar(20) NOT NULL,
  `adminID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminName`, `adminEmail`, `adminPw`, `adminID`) VALUES
('John Doe', 'admin@email.com', 'admin1234', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(20) NOT NULL,
  `patientID` varchar(20) NOT NULL,
  `schedID` int(20) NOT NULL,
  `docID` varchar(10) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patientID`, `schedID`, `docID`, `remarks`) VALUES
(27, '000320070180', 49, 'hz1234', 'Fever and headache'),
(28, '000320070180', 56, 'yuki123', 'eyesight blurry'),
(29, '000320070180', 52, 'yuki123', 'consultation for requesting laser treatment'),
(30, '000320070180', 58, 'yuki123', 'eye feel painful'),
(34, '940210070180', 63, 'hz1234', 'test'),
(35, '940210070180', 64, 'hz1234', 'finally weihhhh'),
(36, '1234567890', 60, 'yuki123', 'eye pain'),
(37, '1234567890', 51, 'hz1234', 'fever'),
(38, '1234567890', 65, 'ch1234', 'headaches'),
(39, '000320070180', 59, 'yuki123', 'eye sore ');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `messages` varchar(256) NOT NULL,
  `response` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `messages`, `response`) VALUES
(1, 'Hi|hi|Hello|hello|Good Day|good day|goodday|Good morning|good morning|morning|Good Afternoon|good afternoon|Good Evening|good evening', 'Hello ! How can I help you?'),
(2, 'How to make an appointment|how to make an appointment|how to make appointment| How to make appointment| Medical Consultation|medical consultation| Appointment|appointment', 'To make an appointment, click on the \"Make An Appointment\" button, Sign in or Sign up are required. After signing in, you can proceed to make an appointment. '),
(3, 'Thanks|thanks|Thank You|Thank you|thank you|thankyou|TQ|tq|Thx|thx', 'You\'re welcome! Have a nice day!'),
(4, 'Bye|bye|bye bye|Bye bye|Bye Bye|Goodbye|Good Bye|good bye|goodbye', 'Good Bye and have a nice day !!!');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` varchar(10) NOT NULL,
  `country` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `country`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthelemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BQ', 'Bonaire, Sint Eustatius and Saba'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo, Democratic Republic of the Congo'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote D\'Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CS', 'Serbia and Montenegro'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CW', 'Curacao'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard Island and Mcdonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran, Islamic Republic of'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People\'s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MF', 'Saint Martin'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia, the Former Yugoslav Republic of'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory, Occupied'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SX', 'Sint Maarten'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan, Province of China'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See (Vatican City State)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.s.'),
('VN', 'Viet Nam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` varchar(10) NOT NULL,
  `departmentName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`) VALUES
('Cardio1', 'Cardiology'),
('Dept1', 'Department1'),
('Gas6', 'Gastroenterology'),
('Gyn7', 'Gynecology'),
('Hepa3', 'Hepatology'),
('Neuro2', 'Neurology'),
('Op5', 'Ophthalmology'),
('Ortho8', 'Orthopaedics'),
('otor10', 'Otorhinolaryngology'),
('Pedia4', 'Pediatrics'),
('Phy9', 'Physiotherapy');

-- --------------------------------------------------------

--
-- Table structure for table `doccomment`
--

CREATE TABLE `doccomment` (
  `commentID` int(10) NOT NULL,
  `appointmentID` int(11) NOT NULL,
  `schedID` int(11) NOT NULL,
  `patientID` varchar(20) NOT NULL,
  `docID` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doccomment`
--

INSERT INTO `doccomment` (`commentID`, `appointmentID`, `schedID`, `patientID`, `docID`, `comment`) VALUES
(17, 27, 49, '000320070180', 'hz1234 ', 'Temperature: 37.5 Low Fever\r\nAntibiotic and medicine for fever'),
(18, 29, 52, '000320070180', 'yuki123 ', 'further screening needed'),
(19, 30, 58, '000320070180', 'yuki123 ', 'eye drop given'),
(22, 33, 62, '940210070180', 'hz1234 ', 'test back\r\n'),
(23, 34, 63, '940210070180', 'hz1234 ', 'Yeet'),
(24, 35, 64, '940210070180', 'hz1234 ', 'ikr really finally'),
(25, 38, 65, '1234567890', 'ch1234 ', 'go sleep '),
(26, 28, 56, '000320070180', 'yuki123 ', 'eye drop given ');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `docFname` varchar(20) NOT NULL,
  `docLname` varchar(20) NOT NULL,
  `docID` varchar(10) NOT NULL,
  `docEmail` varchar(50) NOT NULL,
  `docPhone` varchar(15) NOT NULL,
  `docDepartment` varchar(25) NOT NULL,
  `docGender` varchar(10) NOT NULL,
  `docPw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docFname`, `docLname`, `docID`, `docEmail`, `docPhone`, `docDepartment`, `docGender`, `docPw`) VALUES
('Chee Hoong', 'Lim ', 'ch1234', 'chlim@gmail.com', '0123456789', 'Neurology', 'male', 'test'),
('Eva', 'Teng', 'eva01', 'eva@gmail.com', '01222344566', 'Orthopaedics', 'female', 'test1234'),
('Hui Zhen', 'Lu', 'hz1234', 'huizhen@gmail.com', '012345675678', 'Pediatrics', 'female', 'test123'),
('Xi En', 'Lim', 'lxe20', 'xien20@gmail.com', '0123456789', 'Physiotherapy', 'female', 'lxe20'),
('Tiffany', 'Teh', 'Tiff05', 'tiff@gmail.com', '0123456789', 'Gastroenterology', 'female', 'test1234'),
('Yong Hao', 'Chen', 'yh20', 'yonghao@gmail.com', '0167891234', 'Cardiology', 'male', 'yonghao1234'),
('Yuki', 'Lau ', 'yuki123', 'yukilau15@gmail.com', '0123456789', 'Ophthalmology', 'female', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `doc_sched`
--

CREATE TABLE `doc_sched` (
  `sched_id` int(11) NOT NULL,
  `doc_id` varchar(20) NOT NULL,
  `doc_dept` varchar(30) NOT NULL,
  `sched_datetime` datetime NOT NULL,
  `sched_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_sched`
--

INSERT INTO `doc_sched` (`sched_id`, `doc_id`, `doc_dept`, `sched_datetime`, `sched_status`) VALUES
(37, 'ch1234', 'Neurology', '2021-10-30 15:30:00', 'available'),
(44, 'eva01', 'Orthopaedics', '2021-11-06 13:36:00', 'available'),
(47, 'lxe20', 'Physiotherapy', '2021-10-30 14:43:00', 'available'),
(49, 'hz1234', 'Pediatrics', '2021-11-01 16:30:00', 'Done'),
(51, 'hz1234', 'Pediatrics', '2021-11-25 08:50:00', 'Booked'),
(52, 'yuki123', 'Ophthalmology', '2021-11-25 10:00:00', 'Done'),
(53, 'ch1234', 'Neurology', '2021-11-25 18:00:00', 'available'),
(54, 'ch1234', 'Neurology', '2021-12-01 09:30:00', 'available'),
(55, 'hz1234', 'Pediatrics', '2021-12-04 11:25:00', 'available'),
(56, 'yuki123', 'Ophthalmology', '2021-12-02 12:30:00', 'Done'),
(57, 'yuki123', 'Ophthalmology', '2021-11-10 16:55:00', 'available'),
(58, 'yuki123', 'Ophthalmology', '2021-11-18 03:00:00', 'Done'),
(59, 'yuki123', 'Ophthalmology', '2021-11-25 17:30:00', 'Booked'),
(60, 'yuki123', 'Ophthalmology', '2021-11-26 05:00:00', 'Booked'),
(63, 'hz1234', 'Pediatrics', '2021-11-11 03:47:00', 'Done'),
(64, 'hz1234', 'Pediatrics', '2021-11-12 04:30:00', 'Done'),
(65, 'ch1234', 'Neurology', '2021-11-22 17:46:00', 'Done'),
(66, 'yuki123', 'Ophthalmology', '2021-11-27 09:30:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderId` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `gender`) VALUES
('female', 'Female'),
('male', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `icno` varchar(20) NOT NULL,
  `patient_pw` varchar(20) NOT NULL,
  `patient_fname` varchar(20) NOT NULL,
  `patient_lname` varchar(20) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_add` varchar(100) NOT NULL,
  `nationality` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`icno`, `patient_pw`, `patient_fname`, `patient_lname`, `patient_email`, `patient_phone`, `patient_dob`, `patient_gender`, `patient_add`, `nationality`) VALUES
('000320070180', 'testing1234', 'Xi En', 'Lim', 'limxien20@gmail.com', '+60164506537', '2000-03-20', 'female', 'Seoul, South Korea', 'MY'),
('1234567890', 'testing', 'John', 'Doe', 'john@gmail.com', '10123456789', '1996-11-01', 'male', 'Seoul, South Korea', 'KR'),
('940210070180', 'testing', 'Seulgi', 'Kang', 'ksg@gmail.com', '012987654321', '1994-02-10', 'female', 'Ansan, Seoul', 'KR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patientID` (`patientID`,`schedID`,`docID`),
  ADD KEY `docID` (`docID`),
  ADD KEY `schedID` (`schedID`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `doccomment`
--
ALTER TABLE `doccomment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `appointmentID` (`appointmentID`,`schedID`,`patientID`,`docID`),
  ADD KEY `schedID` (`schedID`),
  ADD KEY `docID` (`docID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `docGender` (`docGender`);

--
-- Indexes for table `doc_sched`
--
ALTER TABLE `doc_sched`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`icno`),
  ADD KEY `nationality` (`nationality`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doccomment`
--
ALTER TABLE `doccomment`
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doc_sched`
--
ALTER TABLE `doc_sched`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patients` (`icno`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`schedID`) REFERENCES `doc_sched` (`sched_id`);

--
-- Constraints for table `doccomment`
--
ALTER TABLE `doccomment`
  ADD CONSTRAINT `doccomment_ibfk_1` FOREIGN KEY (`schedID`) REFERENCES `doc_sched` (`sched_id`),
  ADD CONSTRAINT `doccomment_ibfk_2` FOREIGN KEY (`docID`) REFERENCES `doctors` (`docID`),
  ADD CONSTRAINT `doccomment_ibfk_3` FOREIGN KEY (`appointmentID`) REFERENCES `appointment` (`appointment_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`docGender`) REFERENCES `gender` (`genderId`);

--
-- Constraints for table `doc_sched`
--
ALTER TABLE `doc_sched`
  ADD CONSTRAINT `doc_sched_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`docID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`nationality`) REFERENCES `country` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
