DROP PROCEDURE IF EXISTS `proc_get_vl_age_sample_types`;
DELIMITER //
CREATE PROCEDURE `proc_get_vl_age_sample_types`
(IN A_id VARCHAR(100), IN filter_year INT(11))
BEGIN
  SET @QUERY =    "SELECT
          `month`,
          `year`,
          SUM(`edta`) AS `edta`,
          SUM(`dbs`) AS `dbs`,
          SUM(`plasma`) AS `plasma`,
          SUM(`Undetected`+`less1000`) AS `suppressed`,
          SUM(`Undetected`+`less1000`+`less5000`+`above5000`) AS `tests`,
          SUM((`Undetected`+`less1000`)*100/(`Undetected`+`less1000`+`less5000`+`above5000`)) AS `suppression` 
    FROM `vl_national_age`
    WHERE 1";

    SET @QUERY = CONCAT(@QUERY, " AND `age` ",A_id," AND `year` = '",filter_year,"' GROUP BY `month` ORDER BY `year` ASC, `month` ");
    
    PREPARE stmt FROM @QUERY;
    EXECUTE stmt;
END //
DELIMITER ;
