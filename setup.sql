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
  `time_posted` TIME,
  `reason` TEXT,
  `description` TEXT,
  `skill` TEXT,
  `qualification` TEXT,
  `company_name` TEXT
);

CREATE TABLE IF NOT EXISTS programming_language (
  `id_lang` INT AUTO_INCREMENT PRIMARY KEY,
  `pl_name` TEXT
);

CREATE TABLE IF NOT EXISTS user_account (
  `id_user` INT AUTO_INCREMENT PRIMARY KEY,
  `idPLangs` TEXT,
  `idCompanies` TEXT,
  `usr_name` TEXT,
  `email` TEXT,
  `username` TEXT,
  `passwd` TEXT,
  `address` TEXT,
  `phone` TEXT
);
ALTER TABLE `company` CONVERT TO CHARACTER SET utf8;
