USE db_rcoetzer;

SELECT floor_number AS 'floor', sum(nb_seats) as 'seats' FROM film
GROUP BY floor_number ORDER BY 'seats' DESC