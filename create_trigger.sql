--
-- Triggers `refids`
--
DELIMITER $$
CREATE TRIGGER `trf_refids` BEFORE INSERT ON `refids` FOR EACH ROW BEGIN
      DECLARE nrefid INT;
      SELECT  COALESCE(MAX(refid), 0) + 1
      INTO    nrefid
      FROM    `refids`      
      WHERE   model = NEW.model and `year` = YEAR(CURDATE());
      SET NEW.refid = nrefid;
END
$$
DELIMITER ;