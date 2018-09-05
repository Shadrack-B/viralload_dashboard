DROP PROCEDURE IF EXISTS `proc_get_national_sample_types`;
DELIMITER //
CREATE PROCEDURE `proc_get_national_sample_types`
(IN from_year INT(11), IN to_year INT(11))
BEGIN
  SET @QUERY =    "SELECT
					`month`,
					`year`,
					`edta`,
					`dbs`,
<<<<<<< HEAD
					`plasma`
=======
					`plasma`,
					`alledta`,
					`alldbs`,
					`allplasma`,
					(`Undetected`+`less1000`) AS `suppressed`,
					(`Undetected`+`less1000`+`less5000`+`above5000`) AS `tests`,
					((`Undetected`+`less1000`)*100/(`Undetected`+`less1000`+`less5000`+`above5000`)) AS `suppression`
>>>>>>> dfa5047ba0638ef2034b95dfa69e0cd14bb05ef6
				FROM `vl_national_summary`
                WHERE 1";

    SET @QUERY = CONCAT(@QUERY, " AND `year` = '",from_year,"' OR `year`='",to_year,"' ORDER BY `year` ASC, `month` ");
    
    PREPARE stmt FROM @QUERY;
    EXECUTE stmt;
END //
<<<<<<< HEAD
DELIMITER ;
=======
DELIMITER ;
>>>>>>> dfa5047ba0638ef2034b95dfa69e0cd14bb05ef6
