
-- Table structure for table `events`

CREATE TABLE `events` (
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`title`, `description`, `id`, `date`) VALUES
('Zoom Meetup', 'We are all getting together on Nov 15 in a Zoom room to talk about our current projects.', 23, '2020-11-15'),
('Live Gatsby Coding Session with Joel', 'Joel is going to walk us through the basics of Gatsby in a live Zoom room, on November 17th. Don\'t miss out!', 25, '2020-11-17'),
('Coffee with Social Distancing', 'Hey everyone! We\'re going to have a social distancing coffee and walk. Remember to bring your masks! We\'ll meet at the Berkeley Starbucks at 2128 Oxford St, Berkeley, CA 94704, on November 21. Hope to see you there!', 26, '2020-11-21'),
('Online Happy Hour', 'We are all meeting Friday at 5:00pm to have an online happy hour, where we can get together, chat, and hang out virtually, during these times of social distancing. We hope you will join us!', 32, '2020-11-18'),
('HTML code-along lesson with Matt.', 'Matt is hosting a 1-hour Zoom HTML code-along for beginners. He will only be covering the basics of HTML, no CSS. We hope to see you there!', 38, '2020-11-13'),
('Microcontroller Meetup', 'Joel is bringing a box of microcontrollers to the Berkeley Public Library on Martin Luther King Dr. on Wednesday, Oct 21. This is an opportunity to experiment with logic programming for Arduinos, RaspberryPis, etc. Joel will be at the library at 11:00am', 43, '2020-10-21'),
('Overview of our favorite Udemy courses', 'We will be meeting on Thursday, November 19th in Zoom to discuss which Udemy courses, or other online resources, have been most helpful to us.', 44, '2020-11-19'),
('', '', 45, '0000-00-00');

