<<<<<<< HEAD
DROP PROCEDURE IF EXISTS `proc_get_national_sustxfail_partner`;
DELIMITER //
CREATE PROCEDURE `proc_get_national_sustxfail_partner`
(IN filter_year INT(11), IN filter_month INT(11))
BEGIN
  SET @QUERY =    "SELECT 
                      `p`.`name`, 
                      ((SUM(`vps`.`sustxfail`)/SUM(`vps`.`alltests`))*100) AS `percentages`, 
                      SUM(`vps`.`sustxfail`) AS `sustxfail` 
                  FROM `vl_partner_summary` `vps` 
                  JOIN `partners` `p` 
                  ON `vps`.`partner` = `p`.`ID`
                WHERE 1";

    IF (filter_month != 0 && filter_month != '') THEN
       SET @QUERY = CONCAT(@QUERY, " AND `vps`.`year` = '",filter_year,"' AND `vps`.`month`='",filter_month,"' ");
    ELSE
        SET @QUERY = CONCAT(@QUERY, " AND `vps`.`year` = '",filter_year,"' ");
    END IF;

    SET @QUERY = CONCAT(@QUERY, " GROUP BY `p`.`name` ORDER BY `percentages` DESC  LIMIT 0, 5 ");

    PREPARE stmt FROM @QUERY;
    EXECUTE stmt;
    
END //
DELIMITER ;
=======
DROP PROCEDURE IF EXISTS `proc_get_national_sustxfail_partner`;
DELIMITER //
CREATE PROCEDURE `proc_get_national_sustxfail_partner`
(IN filter_year INT(11), IN from_month INT(11), IN to_year INT(11), IN to_month INT(11))
BEGIN
  SET @QUERY =    "SELECT 
                      `p`.`name`, 
                      ((SUM(`vps`.`sustxfail`)/SUM(`vps`.`alltests`))*100) AS `percentages`, 
                      SUM(`vps`.`sustxfail`) AS `sustxfail` 
                  FROM `vl_partner_summary` `vps` 
                  JOIN `partners` `p` 
                  ON `vps`.`partner` = `p`.`ID`
                WHERE 1";

   
    IF (from_month != 0 && from_month != '') THEN
      IF (to_month != 0 && to_month != '' && filter_year = to_year) THEN
            SET @QUERY = CONCAT(@QUERY, " AND `year` = '",filter_year,"' AND `month` BETWEEN '",from_month,"' AND '",to_month,"' ");
        ELSE IF(to_month != 0 && to_month != '' && filter_year != to_year) THEN
          SET @QUERY = CONCAT(@QUERY, " AND ((`year` = '",filter_year,"' AND `month` >= '",from_month,"')  OR (`year` = '",to_year,"' AND `month` <= '",to_month,"') OR (`year` > '",filter_year,"' AND `year` < '",to_year,"')) ");
        ELSE
            SET @QUERY = CONCAT(@QUERY, " AND `year` = '",filter_year,"' AND `month`='",from_month,"' ");
        END IF;
    END IF;
    ELSE
        SET @QUERY = CONCAT(@QUERY, " AND `year` = '",filter_year,"' ");
    END IF;

    SET @QUERY = CONCAT(@QUERY, " GROUP BY `p`.`name` ORDER BY `percentages` DESC ");

    PREPARE stmt FROM @QUERY;
    EXECUTE stmt;
    
END //
DELIMITER ;
>>>>>>> dfa5047ba0638ef2034b95dfa69e0cd14bb05ef6
