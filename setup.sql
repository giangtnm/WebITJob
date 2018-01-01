CREATE TABLE IF NOT EXISTS `company` (
  `id_company` INT AUTO_INCREMENT PRIMARY KEY,
  `company_name` VARCHAR(250) COLLATE utf8_vietnamese_ci,
  `address` VARCHAR(500) COLLATE utf8_vietnamese_ci,
  `company_logo_link` TEXT,
  `company_link` TEXT,
  `company_job` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `job` (
  `id_job` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(500) COLLATE utf8_vietnamese_ci,
  `salary` INT,
  `address` VARCHAR(500) COLLATE utf8_vietnamese_ci,
  `time_posted` TIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
