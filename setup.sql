CREATE TABLE IF NOT EXISTS `company` (
  `id_company` INT AUTO_INCREMENT PRIMARY KEY,
  `company_name` VARCHAR(250) COLLATE utf8_unicode_ci,
  `company_address` VARCHAR(500) COLLATE utf8_unicode_ci,
  `company_logo_link` TEXT,
  `company_link` TEXT,
  `source` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `job` (
  `id_job` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(500) COLLATE utf8_unicode_ci,
  `address` VARCHAR(500) COLLATE utf8_unicode_ci,
  `job_link` TEXT,
  `source` TEXT,
  `company_name` VARCHAR(250) COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
