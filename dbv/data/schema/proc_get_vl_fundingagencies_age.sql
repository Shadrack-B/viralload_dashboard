DROP PROCEDURE IF EXISTS `proc_get_vl_fundingagencies_age`;
DELIMITER //
CREATE PROCEDURE `proc_get_vl_fundingagencies_age`
(IN filter_year INT(11), IN from_month INT(11), IN to_year INT(11), IN to_month INT(11), IN type INT(11), IN agency INT(11))
BEGIN
  SET @QUERY =    "SELECT
                    `ac`.`name`, 
                    SUM(`vpa`.`tests`) AS `agegroups`, 
                    (SUM(`vpa`.`undetected`)+SUM(`vpa`.`less1000`)) AS `suppressed`,
                    (SUM(`vpa`.`less5000`)+SUM(`vpa`.`above5000`)) AS `nonsuppressed`
                FROM `vl_partner_age` `vpa`
                JOIN `partners` `p` ON `p`.`ID` = `vpa`.`partner` 
                JOIN `agecategory` `ac` ON `vpa`.`age` = `ac`.`ID`
                WHERE 1 ";

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


    SET @QUERY = CONCAT(@QUERY, " AND `p`.`funding_agency_id` = '",agency,"' GROUP BY `ac`.`ID` ORDER BY `ac`.`ID` ASC ");

    PREPARE stmt FROM @QUERY;
    EXECUTE stmt;
END //
DELIMITER ;
