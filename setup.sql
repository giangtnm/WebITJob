CREATE TABLE IF NOT EXISTS `company` (
  `id_company` INT AUTO_INCREMENT PRIMARY KEY,
  `idJobs` TEXT,
  `company_name` TEXT,
  `address` TEXT,
  `company_logo_link` TEXT,
  `company_link` TEXT,
  `company_job` TEXT
);

CREATE TABLE IF NOT EXISTS `job` (
  `id_job` INT AUTO_INCREMENT PRIMARY KEY,
  `idPLang` TEXT,
  `title` TEXT,
  `salary` INT,
  `address` TEXT,
  `time_posted` TIME
);
ALTER TABLE `company` CONVERT TO CHARACTER SET utf8;
