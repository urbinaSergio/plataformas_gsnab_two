CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` INT NOT NULL AUTO_INCREMENT,
  `numero_identificacion` VARCHAR(45) NOT NULL,
  `nombre_estudiante` VARCHAR(50) NOT NULL,
  `cursos_id_cursos` INT NOT NULL,
  `estado_id_estado` INT NOT NULL,
  `fk_plataforma_cambridge` INT NOT NULL,
  `fk_plataforma_fathom_reads` INT NOT NULL,
  `fk_plataforma_milton_ochoa` INT NOT NULL,
  `fk_plataforma_arukay` INT NOT NULL,
  `plataforma_DELFOS_id_plataforma_DELFOS1` INT NOT NULL,
  PRIMARY KEY (`id_estudiante`, `cursos_id_cursos`, `estado_id_estado`, `fk_plataforma_cambridge`, `fk_plataforma_fathom_reads`, `fk_plataforma_milton_ochoa`, `fk_plataforma_arukay`, `plataforma_DELFOS_id_plataforma_DELFOS1`),
  INDEX `fk_estudiante_plataforma_CAMBRIDGE1_idx` (`fk_plataforma_cambridge` ASC),
  INDEX `fk_estudiante_plataforma_FATHOM_READS1_idx` (`fk_plataforma_fathom_reads` ASC),
  INDEX `fk_estudiante_plataforma_MILTON_OCHOA1_idx` (`fk_plataforma_milton_ochoa` ASC),
  INDEX `fk_estudiante_plataforma_ARUKAY1_idx` (`fk_plataforma_arukay` ASC),
  INDEX `fk_estudiante_plataforma_DELFOS2_idx` (`plataforma_DELFOS_id_plataforma_DELFOS1` ASC),
  INDEX `fk_estudiante_estado1_idx` (`estado_id_estado` ASC),
  INDEX `fk_estudiante_cursos1_idx` (`cursos_id_cursos` ASC),
  CONSTRAINT `fk_estudiante_plataforma_CAMBRIDGE1`
    FOREIGN KEY (`fk_plataforma_cambridge`)
    REFERENCES `plataforma_CAMBRIDGE` (`id_plataforma_CAMBRIDGE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_FATHOM_READS1`
    FOREIGN KEY (`fk_plataforma_fathom_reads`)
    REFERENCES `plataforma_FATHOM_READS` (`id_plataforma_FATHOM_READS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_MILTON_OCHOA1`
    FOREIGN KEY (`fk_plataforma_milton_ochoa`)
    REFERENCES `plataforma_MILTON_OCHOA` (`id_plataforma_MILTON_OCHOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_ARUKAY1`
    FOREIGN KEY (`fk_plataforma_arukay`)
    REFERENCES `plataforma_ARUKAY` (`id_plataforma_ARUKAY`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_DELFOS2`
    FOREIGN KEY (`plataforma_DELFOS_id_plataforma_DELFOS1`)
    REFERENCES `plataforma_DELFOS` (`id_plataforma_DELFOS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_estado1`
    FOREIGN KEY (`estado_id_estado`)
    REFERENCES `estado` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_cursos1`
    FOREIGN KEY (`cursos_id_cursos`)
    REFERENCES `cursos` (`id_cursos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;





CREATE TABLE IF NOT EXISTS `plataforma_DELFOS` (
  `id_plataforma_DELFOS` INT NOT NULL,
  `user_DELFOS` VARCHAR(45) NOT NULL,
  `password_DELFOS` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_DELFOS`))
ENGINE = InnoDB




CREATE TABLE IF NOT EXISTS `plataforma_CAMBRIDGE` (
  `id_plataforma_CAMBRIDGE` INT NOT NULL,
  `user_FATHOM_CAMBRIDGE` VARCHAR(45) NOT NULL,
  `password_CAMBRIDGE` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_CAMBRIDGE`))
ENGINE = INNODB



CREATE TABLE IF NOT EXISTS `plataforma_FATHOM_READS` (
  `id_plataforma_FATHOM_READS` INT NOT NULL,
  `user_FATHOM_READS` VARCHAR(45) NOT NULL,
  `password_FATHOM_READS` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_FATHOM_READS`))
ENGINE = INNODB


CREATE TABLE IF NOT EXISTS `plataforma_MILTON_OCHOA` (
  `id_plataforma_MILTON_OCHOA` INT NOT NULL,
  `user_MILTON_OCHOA` VARCHAR(45) NOT NULL,
  `password_MILTON_OCHOA` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_MILTON_OCHOA`))
ENGINE = INNODB

CREATE TABLE IF NOT EXISTS `plataforma_ARUKAY` (
  `id_plataforma_ARUKAY` INT NOT NULL,
  `user_ARUKAY` VARCHAR(45) NOT NULL,
  `password_ARUKAY` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_ARUKAY`))
ENGINE = INNODB


CREATE TABLE IF NOT EXISTS `cursos` (
  `id_cursos` INT NOT NULL,
  `nombre_curso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cursos`))
ENGINE = INNODB



CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` INT NOT NULL,
  `nombre_estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado`))
ENGINE = InnoDB

