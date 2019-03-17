-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 05:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cimosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_client`
--

CREATE TABLE `img_client` (
  `id_client` int(11) NOT NULL,
  `client_img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_client`
--

INSERT INTO `img_client` (`id_client`, `client_img`, `created_at`, `updated_at`) VALUES
(1, 'client1.png', '2019-01-22 04:25:46', '2019-01-22 04:25:46'),
(2, 'client2.png', '2019-01-22 04:25:46', '2019-01-22 04:25:46'),
(3, 'client3.png', '2019-01-22 04:25:46', '2019-01-22 04:25:46'),
(4, 'client4.png', '2019-01-22 04:25:46', '2019-01-22 04:25:46'),
(5, 'client5.png', '2019-01-22 04:25:47', '2019-01-22 04:25:47'),
(6, 'client6.png', '2019-01-22 04:25:47', '2019-01-22 04:25:47'),
(7, 'client7.png', '2019-01-22 04:25:47', '2019-01-22 04:25:47'),
(8, 'client8.png', '2019-01-22 04:25:47', '2019-01-22 04:25:47'),
(9, 'client9.png', '2019-01-22 04:25:47', '2019-01-22 04:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sofas', 'sofas', NULL, NULL),
(2, 'Chairs', 'chairs', NULL, NULL),
(3, 'Tables', 'tables', NULL, NULL),
(4, 'Home Decors', 'home-decors', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_project`
--

CREATE TABLE `kategori_project` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_01_13_045335_create_levels_table', 1),
(3, '2019_01_16_061825_CreateKategoriProduk', 1),
(4, '2014_10_12_000000_create_users_table', 2),
(5, '2019_01_13_115608_CreatePostTable', 3),
(6, '2019_01_23_110115_CreateKategoriProject', 4),
(7, '2019_01_16_120354_CreateProdukTable', 5),
(8, '2019_01_22_055254_CreateTableEvent', 6),
(9, '2019_01_16_121314_CreateProdukImgTable', 7),
(10, '2019_01_23_110840_CreateProjectsTable', 8),
(11, '2019_01_23_110931_CreateSubImgProjectsTable', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `img`, `title`, `slug`, `konten`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '9538-test1.jpeg', 'Best Ideas For Workplace Design for Better Productivity and High Spirits', 'best-ideas-for-workplace-design-for-better-productivity-and-high-spirits', '<p><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>An office is a place where employees spend a majority of their quality time. Hence it&acirc;&#128;&#153;s very necessary to have a sober yet interesting ambience so that they feel motivated and happy.</span><br style=\'box-sizing: inherit; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Below is a list of some design elements for office that can act as a catalyst for employee morale -&nbsp;</span><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Badly designed office furniture can hurt staff health leading to frequent or prolonged workplace absence, impacting productivity. Neck strain, back torment and leg torment are the most common posture-related complaints among workers these days.</span><br><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Providing an adjustable element so that workers can alter their workspaces to address their issues and utilize adaptable furniture to make distinctive space types for impromptu meetings, workshops or solo work, will go a long way in easing routine functioning.</span><br style=\'box-sizing: inherit; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>To ensure your employees don\'t endure these torments, begin with ergonomic seats and separately organized workplaces, changed in accordance with the proportions of the person\'s body.</span><br style=\'box-sizing: inherit; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Boring and blandly designed furniture makes individuals lazy and leads to vastly reduced enthusiasm. Add colourful and vibrant furniture to alleviate stress and elevate enthusiasm and productivity.</span></p>\n', 2, NULL, '2019-01-23 20:37:41', '2019-01-23 20:37:41'),
(2, '9875-test2.jpeg', 'New Age Companies Choosing Office Furniture Renting over Buying', 'new-age-companies-choosing-office-furniture-renting-over-buying', '<p><span style=\'color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Start-up culture has been revolutionizing all around the globe for the last few years. This culture has given rise to co-working or office-rental in India. Because of the budget constraints, the start-ups\' plans for temporary setting in the beaning, where furniture rentals come in as a cost-effective alternative. Owning the furniture would not be the smart idea as of when the team grows, or they need to shift to the different office, the movement will cost a lot from their start-up savings, renting the furniture will help them in relocation as well.</span><p><span style=\'box-sizing: inherit; font-weight: 700; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>The Current Analysis of the Market</span></p><p><span style=\'box-sizing: inherit; font-weight: 700; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"font-weight: 400;\">According to PricewaterhouseCoopers, the sharing economy will generate potential revenue of</span><span style=\"box-sizing: inherit;\">&nbsp;</span><span style=\"font-weight: 400;\">$335 billion by 2025 globally. In India, just the market for rental of furniture is seen at around $800-850 million.&nbsp; Around 15% of furniture rental is for the corporate office furniture rental segment. Office furniture consists of furniture used in corporate office mainly tables and chairs. As rental companies also have the option of rent to buy, when the new companies finalize their permanent setting, they can buy the furniture they have been renting. Growth in the number of businesses stimulates the demand for office furniture. Moreover, as the unemployment rate falls, or as new small companies or startups comes, the demand for office furniture is anticipated to rise, as businesses require furniture for new employees</span></span></p><p><span style=\'box-sizing: inherit; font-weight: 700; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit;\">Multiple Choices</span></span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>It is very necessary to have the right feel at work, to keep the motivation alive. This is one of the most important questions that comes one\'s mind after getting the office space. But, to kickstart the new business, they require to make every decision that fits their financial investment plans. Purchasing furniture in this scenario could be the wrong choice. It is always wiser to go for cost affecting option that is renting the office furniture instead, as it also helps to conserve the capital and at the same time gives multiple choices furniture to choose from.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Office Furniture rentals come with the range of options for furniture options for the lobby, reception, workstations, breakout /pantry areas, cafeteria, conference &amp; training rooms, etc., Along with the options of customization as per your requirement.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">Fewer Liabilities</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>The growth of any company is never predictable. Be it a startup or a small business enterprise, one can never know when the company faces fast-paced growth. At that time there is a sudden need for internal growth as well, in terms of the company size and team size. In such circumstances, furniture rental comes as a rescue and fill up your expanded space suiting your time and preference for furniture. Whereas, purchasing comes with lots of lead times in between. It\'s during this growth phases the companies also choose to relocate to bigger offices. Owning furniture could be a huge disadvantage at this time. It would cost you an extra amount just for shifting from one location to another. On the other hand, renting comes with the advantage of like it doesn&Atilde;&cent;&acirc;&#130;&not;&acirc;&#132;&cent;t lock your money, it eases your shifting hassles and you have the choice of refreshing the furniture at your will.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>With the growth or any change in the business, the preference of office settings also changes. Like today you are a small company or a start-up, you just want to have a setting for your team to work together, but as you develop you want to start defining your setting with a theme of what exactly you do. If you own the furniture you need to resale them and order the different ones, but how often would this be feasible? Renting can act as a hero in this case as well. You can keep changing the furniture as per your change in taste, whenever you want.&nbsp; For such cases, renting furniture is a great alternative for buying them.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>There are also entrepreneurs who do not want to go for regular changes in their office, considering the change in their brand identity. For them, the renting companies come with an option of Rent to buy, through which you can own the furniture you have been renting for a while. After the period when you are sure that you can now have a permanent office and you won&Atilde;&cent;&acirc;&#130;&not;&acirc;&#132;&cent;t be relocating to any place else, you can finally come you a conclusion of your office design and setting. Here furniture rental serves as the platform where you can experiment with few designs and then finally select the setting you are satisfied with and purchase the furniture you have been renting.<br></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\"></span></p><p></p></p>\n', 2, NULL, '2019-01-23 20:39:45', '2019-01-23 20:39:56'),
(3, '6998-test3.jpeg', 'This Company Is Betting You\'ll Subscribe to Their Sofa', 'this-company-is-betting-youll-subscribe-to-their-sofa', '<p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><i style=\"box-sizing: inherit; line-height: inherit;\">In this&nbsp;<a href=\"https://www.entrepreneur.com/topic/real-entrepreneurs\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">ongoing series</a>, we are sharing advice, tips&nbsp;and insights from real entrepreneurs who are out there doing business battle on a daily basis. (Answers have been edited and condensed for clarity.)</i><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">Who are you, and what&acirc;&#128;&#153;s your business?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>I am Michael Barlow, co-founder and CEO of&nbsp;<a href=\"https://fernish.co/\" rel=\"follow\" target=\"_blank\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">Fernish</a>, a lifestyle&nbsp;<a href=\"https://www.entrepreneur.com/topic/subscription-services\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">subscription service</a>for the home. We let people choose the home furnishings they want for however long they want them, for one monthly subscription price. With trends around mobility, ownership&nbsp;and the changing way that people value time, Fernish makes a ton of sense for the 25 million young professionals currently both renting their homes and planning to move within the next 12 months. We started our business in Los Angeles and will be launching in greater Seattle area later this month.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">You just went on our show&nbsp;<i style=\"box-sizing: inherit; line-height: inherit;\">Entrepreneur Elevator Pitch.&nbsp;</i>How did it go?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>My co-founder and I were very excited to participate. Being on-camera is a rush, and pitching your business on camera is even better.&nbsp;I think our episode of the show airs later this month, and you\'ll have to stay tuned for the ultimate outcome!</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">What inspired you to create this company?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\"><span style=\"font-weight: 400;\">I&acirc;&#128;&#153;ve moved five times since finishing college and had multiple sets of roommates in both New York and Los Angeles. And I threw away a lot of self-built furniture in the process. The true &acirc;&#128;&#156;</span><a href=\"https://www.entrepreneur.com/article/236098\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; background-color: rgb(255, 255, 255); color: rgb(18, 137, 196); font-weight: 400;\">aha&nbsp;moment</a><span style=\"font-weight: 400;\">&acirc;&#128;&#157; for Fernish was in early 2017 when my now-fianc&Atilde;&copy;e was moving from Chicago to join me in Los Angeles. We started brainstorming a business model to make the whole moving and furnishing process not just easy, but actually inspiring and exciting.</span></span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">How is it different from others like it?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>There are a few startup furniture rental companies out there now. We&acirc;&#128;&#153;ve never wanted to play in that category but rather created a new one based on exactly what our target customers are asking for, which we&acirc;&#128;&#153;ve branded as a \"lifestyle subscription service.\"</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>We place an incredible value on customer development and customer experience. We built all of Fernish&acirc;&#128;&#153;s services through interviews and surveys before we even had a website -- and we continually sharpen our service through real-time feedback loops across all stages of our acquisition funnel. Not to mention a fantastic relationship we have with Crate &amp; Barrel and about a dozen other players in the furniture space!</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">What does the word &acirc;&#128;&#156;entrepreneur&acirc;&#128;&#157; mean to you?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\"></span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>To me, &acirc;&#128;&#156;<a href=\"https://www.entrepreneur.com/magazine\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">entrepreneur</a>&acirc;&#128;&#157; means a combination of problem solvers and storytellers. We solve a problem we&acirc;&#128;&#153;ve experienced ourselves, then we tell a story to consumers so they let us solve that same problem for them.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">What was your toughest challenge, and how did you overcome it?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>Two challenges come to mind in starting a company: hiring the right team and building the right&nbsp;<a href=\"https://www.entrepreneur.com/top-company-culture\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">culture</a>. Hiring is something that entrepreneurs have to be incredibly intentional about. It would have been so easy for us to hire someone &acirc;&#128;&#156;good enough&acirc;&#128;&#157; to fill a position. But the discipline for maintaining a high bar (a &acirc;&#128;&#156;bar-raiser&acirc;&#128;&#157; in&nbsp;<a href=\"https://www.entrepreneur.com/slideshow/298895\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">Amazon</a>-speak) is what I think differentiates companies in the long term.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>We&acirc;&#128;&#153;ve built an environment where people are excited to come to work, ideas are valued and heard, and intellectual curiosity is highly encouraged. I mean, we have everything from aerospace inventory planning experts to missile systems engineers to a former Amazon product lead -- how could you not respect the perspectives and be excited to work with a group like that?&nbsp;But we also maintain a healthy amount of lightheartedness and like to have fun, which, given the intensity of a startup, is needed to keep us all balanced.</p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'><span style=\"box-sizing: inherit; font-weight: 700;\">How has your leadership style evolved?</span></p><p style=\'box-sizing: inherit; margin-top: 1rem; margin-bottom: 1rem; color: rgb(33, 33, 33); font-family: \"PT Serif\", TimesNewRoman, \"Times New Roman\", Times, Georgia, serif; font-size: 19px;\'>I had the opportunity to be a four-year NCAA athlete, which shaped a lot of my&nbsp;<a href=\"https://www.entrepreneur.com/topic/leadership\" rel=\"follow\" target=\"_self\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(18, 137, 196);\">leadership&nbsp;</a>style. In sports, it&acirc;&#128;&#153;s all about teamwork, trust and improvement. In a professional setting, that has come through as a combination of democratic and transformational leadership. I don&acirc;&#128;&#153;t like to make decisions in a vacuum. I like to build consensus around a path forward wherever possible. I also like to set measurable goals as a motivational tool, which can drive professional growth and pride in your work.&nbsp;</p></p>\n', 2, NULL, '2019-01-23 20:42:49', '2019-01-23 20:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(10) UNSIGNED NOT NULL,
  `nama_project` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subprodukimg`
--

CREATE TABLE `subprodukimg` (
  `sub_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subprojectimg`
--

CREATE TABLE `subprojectimg` (
  `sub_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `level_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'admin', '$2y$10$yjIWEJOb3S37M2bUP8B89uL1K.pWdkiHjMK/RKgX2sbP8AfEowexe', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `img_client`
--
ALTER TABLE `img_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_project`
--
ALTER TABLE `kategori_project`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `project_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `subprodukimg`
--
ALTER TABLE `subprodukimg`
  ADD KEY `subprodukimg_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `subprojectimg`
--
ALTER TABLE `subprojectimg`
  ADD KEY `subprojectimg_project_id_foreign` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_client`
--
ALTER TABLE `img_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_project`
--
ALTER TABLE `kategori_project`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_produk` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_project` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `subprodukimg`
--
ALTER TABLE `subprodukimg`
  ADD CONSTRAINT `subprodukimg_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `subprojectimg`
--
ALTER TABLE `subprojectimg`
  ADD CONSTRAINT `subprojectimg_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id_project`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
