USE db_rcoetzer;
-- include table name
SELECT upper(last_name) AS NAME, first_name, price FROM member
WHERE subscription.price > 42
ORDER BY last_name ASC, first_name ASC;
