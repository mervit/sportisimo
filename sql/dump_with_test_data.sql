DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `deleted` tinyint(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;

INSERT INTO `manufacturer` (`id`, `name`, `deleted`) VALUES
     (1,	'Test',	0),
     (2,	'Test 2',	0),
     (3,	'Test s dlouhatááááánskym názvem',	0),
     (4,	'blabla',	0),
     (5,	'Reofe',	0),
     (6,	'h9734g34',	0),
     (7,	'fsegeshger',	0),
     (8,	'feawfwaef',	0),
     (9,	'fawrgesge',	0),
     (10,	'gykgylkyg',	0),
     (11,	'hsrgerg',	0),
     (12,	'gjtfjyftntfy',	0),
     (13,	'puouykyuik',	0),
     (14,	'gseherge',	0),
     (15,	'qwewesgr',	0),
     (16,	'zvzvsfd',	0),
     (17,	'sehseheshseh',	0),
     (18,	'grthdrthrdht',	0),
     (19,	'hserseger',	0),
     (20,	'hrhrdhdrth',	0),
     (21,	'aefwafwaefwaf',	1),
     (22,	'mftmftjyftj',	0),
     (23,	'gergsergesr',	0),
     (24,	'gsehsethsth',	1),
     (25,	'Testovaci',	1),
     (26,	'Testovacííí222',	0),
     (27,	'Bla bla',	0);