USE db_rcoetzer;

SELECT last_name, first_name, DATE(birthdate) AS birthdate FROM user_card
WHERE YEAR(birthdate) = 1989;