USE db_rcoetzer;

SELECT count(*) as 'nb_short-films' FROM film
WHERE duration < 43;