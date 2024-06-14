DROP DATABASE IF EXISTS FITNESSDATABASE;

CREATE DATABASE FITNESSDATABASE;

USE FITNESSDATABASE;

CREATE TABLE MEAL_PLAN (
	FOOD_NAME VARCHAR(255),
	FOOD_ID INT NOT NULL PRIMARY KEY,
	CALORIES INT,
	CARBS INT,
	FATS INT,
	PROTEINS INT,
	RATING VARCHAR(20)
);

CREATE TABLE WORKOUTS (
	WORKOUT_ID INT NOT NULL PRIMARY KEY,
	MUSCLE_GROUP VARCHAR(20),
	WO_NAME VARCHAR(255),
	REPS INT,
	SETS INT
);



-- DROP TABLE USERS;
CREATE TABLE USERS (
	UNAME VARCHAR(255),
	PASSWORDS VARCHAR(225) NOT NULL,
	CWID INT(9) NOT NULL PRIMARY KEY,
	HEIGHT INT NOT NULL,
	WEIGHT INT NOT NULL,
	
    BMI DECIMAL(4, 1),
	CAL_INTAKE INT NOT NULL
    
	
);


CREATE TABLE WORKOUT_LOG (
	LOG_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	-- LINK_ID CHAR(15) NOT NULL,
	LOG_DATE DATE,
    UCWID INT,
	MUSCLES VARCHAR(20),
    FOREIGN KEY (UCWID) REFERENCES USERS(CWID)
);

CREATE TABLE USER_LINK (
	UCWID INT(9),
    UFOOD INT,
    PRIMARY KEY (UCWID, UFOOD),
    
	FOREIGN KEY (UCWID) REFERENCES USERS(CWID),
	FOREIGN KEY (UFOOD) REFERENCES MEAL_PLAN(FOOD_ID)
	
);

ALTER TABLE WORKOUT_LOG ADD CONSTRAINT fk_user_cwid FOREIGN KEY (UCWID) REFERENCES USERS (CWID) ON DELETE CASCADE;
ALTER TABLE USER_LINK ADD CONSTRAINT fk_users_cwid FOREIGN KEY (UCWID) REFERENCES USERS (CWID) ON DELETE CASCADE;

-- Stored Procedures
DELIMITER //
CREATE PROCEDURE GetWorkouts()
BEGIN
    SELECT * FROM WORKOUTS AS WO WHERE EXISTS (SELECT * FROM WORKOUT_LOG WHERE MUSCLES = WO.MUSCLE_GROUP);
END //

DELIMITER //
CREATE PROCEDURE GetWorkoutLog()
BEGIN
    SELECT * FROM WORKOUT_LOG AS WLOG WHERE EXISTS (SELECT * FROM USERS WHERE CWID = WLOG.UCWID);
END //

DELIMITER //
CREATE PROCEDURE GetFOOD(IN ID INT(9))
BEGIN
    SELECT * FROM MEAL_PLAN WHERE EXISTS (SELECT CALORIES FROM USERS WHERE CWID = ID);
END //

DELIMITER //
CREATE PROCEDURE UpdateWeight(IN MASS INT, ID INT (9))
BEGIN
    UPDATE USERS SET WEIGHT = MASS WHERE CWID = ID;
END //

DESCRIBE USERS;

-- Breakfast
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Oatmeal with fruit', 2000, 187, 34, 5, 2, 'Balanced');
	INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Toast with eggs and orange juice', 2001, 508, 46, 11, 11, 'Balanced'),
    ('Toast with sausage and orange juice', 2002, 447, 59, 13, 18, 'High-protein');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('English muffin with sausage', 2003, 322, 27, 12, 18, 'High-protein'),
    ('Granola with fruit and yogurt', 2004, 125, 24, 5, 2, 'Balanced'),
    ('Whole-wheat pancakes with syrup', 2005, 324, 38, 11, 14, 'Balanced'),
    ('Green Smoothie', 2006, 120, 30, 3, 0, 'Low-carb'),
    ('Açaí Bowl', 2007, 70, 4, 1, 5, 'Low-carb'),
    ('Avocado toast', 2008, 179, 16, 4, 14, 'Low-carb'),
    ('Mixed Berries and Banana Smoothie', 2009, 168, 38, 0, 1, 'Balanced'),
    ('Mango Smoothie', 2010, 120, 22, 5, 2, 'Balanced'),
    ('Egg and cheese omelet', 2011, 177, 1, 10, 15, 'High-protein'),
    ('Veggie omelet', 2012, 620, 19, 37, 44, 'Vegetarian'),
    ('English muffin with veggie-sausage', 2013, 202, 29, 14, 4, 'Low-carb'),
    ('Toast with veggie-sausage and orange juice', 2014, 327, 61, 15, 4, 'Low-carb'),
    ('Yogurt with banana', 2015, 113, 21, 5, 2, 'Vegan'),
    ('bagel with peanut butter and sliced bananas', 2016, 385, 74, 13, 10, 'Vegan'),
    ('bagel with cream cheese and sliced bananas', 2017, 114, 18, 11, 0, 'Vegan'),
    ('bagel with cream cheese and yogurt', 2018, 528, 68, 22, 19, 'High-protein'),
    ('Breakfast burrito w/ eggs and sausage', 2019, 277, 21, 11, 16, 'Vegetarian');
    
-- Lunch & Dinner
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Taco Salad', 2020, 400, 25, 25, 20, 'High-Protein');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Baked salmon', 2021, 250, 0, 30, 15, 'Low-carb'),
    ('Grilled shrimp with rice and veggies', 2022, 350, 40, 25, 10, 'Balanced');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Cauliflower fried rice', 2023, 200, 15, 5, 10, 'Low-carb'),
    ('Vegetarian Enchiladas', 2024, 350, 30, 20, 15, 'Balanced'),
    ('Pizza with Tomato, Mozzarella and Basil', 2025, 300, 30, 15, 15, 'Balanced'),
    ('Sweet and Tangy Chicken Burgers', 2026, 350, 30, 25, 15, 'High-Protein'),
    ('Kale and Apple Salad', 2027, 200, 20, 5, 10, 'Vegan');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Chicken Ranch Salad', 2028, 300, 15, 25, 20, 'High-Protein'),
    ('Chicken Caesar Salad', 2029, 350, 20, 25, 25, 'High-Protein'),
    ('Caesar Salad',2030, 250, 15, 10, 20, 'Balanced'),
    ('Asian Chopped Chicken Salad', 2031, 300, 25, 20, 15, 'Low-carb'),
    ('Tuscan kale salad', 2032, 200, 20, 5, 10, 'Vegan'),
    ('Turkey Tacos', 2033, 300, 20, 20, 15, 'High-Protein');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Healthy BBQ Salmon Sheet Pan Dinner', 2034, 350, 30, 25, 15, 'High-Protein'),
    ('Hummus and Grilled Vegetable Wrap', 2035, 300, 35, 10, 15, 'Vegan'),
    ('Grilled Chicken and veggie wrap', 2036, 350, 30, 20, 15, 'Balanced'),
    ('Chicken noodle soup', 2037, 250, 20, 15, 10, 'Balanced'),
    ('Asian Chicken Rice Bowl', 2038, 400, 40, 25, 15, 'Balanced'),
    ('Tuna Salad Sandwich', 2039, 350, 25, 20, 20, 'High-Protein'),
    ('Ham & cheese sandwich on wheat bread w/light mayo, lettuce & tomato', 2040, 350, 30, 20, 15, 'Balanced'),
    ('Chili', 2041, 300, 25, 20, 15, 'Balanced'),
    ('Veggie Chili', 2042, 250, 20, 15, 10, 'Vegan'),
    ('Vegetable Soup', 2043, 200, 20, 10, 5, 'Vegan'),
    ('Green Smoothie', 2044, 150, 25, 5, 5, 'Vegan'),
    ('Açaí Bowl', 2045, 300, 40, 10, 10, 'Vegan');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Energy Bars', 2046, 250, 30, 15, 10, 'Low-carb'),
    ('Beefly Baked Potatoes', 2047, 400, 30, 20, 20, 'Balanced'),
    ('Baked Potatoes', 2048, 250, 40, 5, 5, 'Balanced'),
    ('Turkey Burgers', 2049, 300, 20, 25, 15, 'High-Protein'),
    ('Beyond Burgers', 2050, 300, 20, 20, 20, 'Vegan'),
    ('Chicken, rice, and veggie bowl', 2051, 400, 35, 25, 10, 'Balanced'),
    ('Vegan Pasta', 2052, 350, 40, 15, 15, 'Vegan'),
    ('Chicken pasta with bread', 2053, 450, 50, 20, 20, 'Balanced'),
    ('pasta with veggies', 2054, 300, 40, 10, 10, 'Vegan');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Homemade mac & cheese', 2055, 400, 30, 15, 20, 'Low-carb'),
    ('Orange chicken and veggie stir fry', 2056, 350, 30, 20, 15, 'Balanced'),
    ('“ants on a log”', 2057, 150, 15, 5, 5, 'Balanced'),
    ('Stir-fried brown rice with chicken', 2058, 350, 40, 20, 15, 'Balanced'),
    ('Salmon with Kale and Apple Salad', 2059, 350, 25, 25, 20, 'Balanced'),
    ('Tai Basil Chicken', 2060, 350, 30, 25, 15, 'Balanced'),
    ('Vegetable Noodle Soup', 2061, 200, 25, 10, 5, 'Vegan');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Turkey and cheese wrap with mayo, lettuce and tomato in a flour tortilla', 2062, 400, 30, 20, 20, 'Balanced'),
    ('Turkey & cheese sandwich on wheat bread w/light mayo, lettuce & tomato', 2063, 350, 30, 20, 15, 'Balanced'),
	('Beans, rice, and veggie bowl', 2064, 350, 50, 15, 5, 'Vegan'),
    ('Turkey meatballs', 2065, 300, 10, 25, 15, 'High-Protein'),
    ('Veggie meatballs', 2066, 250, 20, 15, 10, 'Vegan'),
    ('Vegetable and tofu stir-fry', 2067, 250, 25, 15, 10, 'Balanced'),
    ('Egg salad lettuce wraps', 2068, 250, 10, 15, 20, 'Low-carb');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Grilled turkey panini on wheat', 2069, 400, 30, 25, 20, 'Balanced'),
    ('Grilled veggie panini on wheat', 2070, 350, 40, 10, 15, 'Vegan'),
    ('Whole wheat pita pizzas with veggies', 2071, 300, 35, 15, 10, 'Vegan'),
    ('Thai peanut tofu with rice.', 2072, 400, 45, 20, 15, 'Balanced'),
    ('Lentil and vegetable curry', 2073, 300, 40, 15, 10, 'Vegan'),
    ('Beef stew', 2074, 350, 20, 25, 15, 'Balanced'),
    ('Fruit salad (strawberries, blueberries, bananas, etc)', 2075, 150, 35, 2, 0, 'Vegan');
    INSERT INTO MEAL_PLAN(FOOD_NAME, FOOD_ID, CALORIES, CARBS, FATS, PROTEINS, RATING) VALUES('Fruit salad w/granola & yogurt (strawberries, blueberries, bananas, etc)', 2076, 250, 40, 10, 5, 'Balanced'),
    ('Turkey and greens', 2077, 300, 15, 25, 15, 'High-Protein'),
    ('Caprese salad with grilled chicken', 2078, 350, 10, 30, 20, 'High-Protein'),
    ('Whole wheat pita pizzas with veggies and grilled chicken', 2079, 400, 40, 25, 15, 'Balanced'),
    ('Sushi (California Roll)', 2080, 300, 45, 15, 5, 'Low-carb'),
    ('Veggie sushi rolls', 2081, 250, 40, 10, 5, 'Vegan'),
    ('Mediterranean-style tuna salad', 2082, 350, 10, 20, 25, 'High-Protein'),
    ('Spaghetti and turkey meatballs', 2083, 400, 40, 25, 15, 'Balanced'),
    ('Spaghetti and veggie meatballs', 2084, 350, 45, 15, 10, 'Vegan'),
    ('Shepherd\'s pie', 2085,400, 30, 20, 20, 'Balanced'),
    ('Veggie shepherd\'s pie', 2086, 350, 35, 15, 15, 'Vegan'),
    ('Vegetable stir-fry with tofu and brown rice', 2087, 300, 40, 15, 10, 'Balanced');

	-- WORKOUT DATA
    INSERT INTO WORKOUTS(WORKOUT_ID, MUSCLE_GROUP, WO_NAME, REPS, SETS) VALUES(1000, 'Deltoids', 'Standing Military Press', 12, 3);
	INSERT INTO WORKOUTS(WORKOUT_ID, MUSCLE_GROUP, WO_NAME, REPS, SETS) VALUES(1001, 'Deltoids', 'Lateral Raises', 15, 3),
	(1002, 'Deltoids', 'Front Raises', 15, 3);
	INSERT INTO WORKOUTS(WORKOUT_ID, MUSCLE_GROUP, WO_NAME, REPS, SETS) VALUES(1003, 'Deltoids', 'Bent-Over Reverse Flyes', 15, 3),
	(1004, 'Deltoids', 'Arnold Press', 12, 3),
	(1005, 'Deltoids', 'Upright Row', 12, 3),
	(1006, 'Biceps', 'Bicep Curls', 12, 3),
	(1007, 'Biceps', 'Hammer Curls', 12, 3),
	(1008, 'Biceps', 'Concentration Curls', 12, 3),
	(1009, 'Biceps', 'Preacher Curls', 12, 3),
	(1010, 'Biceps', 'Incline Dumbbell Curls', 12, 3),
	(1011, 'Biceps', 'Cable Bicep Curls', 12, 3),
	(1012, 'Chest', 'Barbell Bench Press', 12, 3),
	(1013, 'Chest', 'Dumbbell Flyes', 12, 3),
	(1014, 'Chest', 'Incline Bench Press', 12, 3),
	(1015, 'Chest', 'Chest Dips', 12, 3),
	(1016, 'Chest', 'Push-Ups', 12, 3),
	(1017, 'Chest', 'Cable Crossover', 12, 3),
	(1018, 'Forearm', 'Wrist Curls', 15, 3),
	(1019, 'Forearm', 'Reverse wrist curls', 15, 3),
	(1020, 'Forearm', 'Hammer curls', 12, 3),
	(1021, 'Forearm', 'Farmers walk', 45, 3),
	(1022, 'Forearm', 'Behind-the-back wrist curls', 15, 3),
	(1023, 'Forearm', 'Reverse barbell curls', 12, 3),
	(1024, 'SideAbs', 'Russian Twists', 12, 3),
	(1025, 'SideAbs', 'SidePlanks', 12, 3),
	(1026, 'SideAbs', 'Side Plank Hip Dips', 12, 3),
	(1027, 'SideAbs', 'Oblique V-ups', 12, 3),
	(1028, 'SideAbs', 'Bicycle Crunches', 12, 3),
	(1029, 'SideAbs', 'Woodchoppers', 12, 3),
	(1030, 'Abdominal', 'Crunches', 12, 3),
	(1031, 'Abdominal', 'Leg Raises', 12, 3),
	(1032, 'Abdominal', 'Planks', 12, 3),
	(1033, 'Abdominal', 'Mountain Climbers', 12, 3),
	(1034, 'Abdominal', 'Russian Twists', 12, 3),
	(1035, 'Abdominal', 'Bicycle Crunches', 12, 3),
	(1036, 'Quads', 'Barbell Squats', 12, 3),
	(1037, 'Quads', 'Leg Press', 12, 3),
	(1038, 'Quads', 'Walking Lunges', 12, 3),
	(1039, 'Quads', 'Leg Extensions', 12, 3),
	(1040, 'Quads', 'Split Squats', 12, 3),
	(1041, 'Quads', 'Step-Ups', 12, 3),
	(1042, 'calves', 'Standing Calf Raises', 12, 3),
	(10043, 'calves', 'Seated Calf Raises', 12, 3),
	(1044, 'calves', 'Calf Raises on Leg Press Machine', 12, 3),
	(1045, 'calves', 'Jump Rope', 12, 3),
	(1046, 'calves', 'Box Jumps', 12, 3),
	(1047, 'calves', 'Single-Leg Calf Raises', 12, 3),
	(1048, 'TibialAnterior', 'Toe Raises', 12, 3),
	(1049, 'TibialAnterior', 'Dorsiflexion  with Resistance Band', 12, 3),
	(1050, 'TibialAnterior', 'Tibialis Raises on Leg Press Machine', 12, 3),
	(1051, 'TibialAnterior', 'Resistance Band Dorsiflexion', 12, 3),
	(1052, 'TibialAnterior', 'Tibialis Anterior Stretch', 12, 3),
	(1053, 'TibialAnterior', 'Calf and Shin Raises', 12, 3),
	(1054, 'Upper back', 'Pull-Ups', 15, 3),
	(1055, 'Upper back', 'Bent-Over Rows', 12, 3),
	(1056, 'Upper back', 'Lat Pulldowns', 12, 3),
	(1057, 'Upper back', 'T-Bar Row', 12, 3),
	(1058, 'Upper back', 'Seated Cable Rows', 12, 3),
	(1059, 'Upper back', 'Face Pulls', 15, 3),
	(1060, 'Middle back', 'One-Arm Dumbbell Rows', 12, 3),
	(1061, 'Middle back', 'T-Bar Rows', 12, 3),
	(1062, 'Middle back', 'Seated Cable Rows with Wide Grip', 12, 3),
	(1063, 'Middle back', 'Barbell Bent-Over Rows (Underhand Grip)', 12, 3),
	(1064, 'Middle back', 'Chest-Supported Dumbbell Row', 15, 3),
	(1065, 'Middle back', 'Reverse Flyes', 15, 3),
	(1066, 'Lower back', 'Deadlifts', 10, 3),
	(1067, 'Lower back', 'Hyperextensions (Back Extensions)', 15, 3),
	(1068, 'Lower back', 'Good Mornings', 12, 3),
	(1069, 'Lower back', 'Supermans', 15, 3),
	(1070, 'Lower back', 'Romanian Deadlifts', 12, 3),
	(1071, 'Lower back', 'Bird Dogs', 10, 3),
	(1072, 'Triceps', 'Tricep Dips', 12, 3),
	(1073, 'Triceps', 'Skull Crushers (Lying Triceps Extensions)', 12, 3),
	(1074, 'Triceps', 'Tricep Pushdowns', 15, 3),
	(1075, 'Triceps', 'Close-Grip Bench Press', 12, 3),
	(1076, 'Triceps', 'Overhead Tricep Extension', 15, 3),
	(1077, 'Triceps', 'Diamond Push-Ups', 12, 3),
	(1078, 'Hamstrings', 'Romanian Deadlifts', 12, 3),
	(1079, 'Hamstrings', 'Lying Leg Curls', 15, 3),
	(1080, 'Hamstrings', 'Stiff-Legged Deadlifts', 12, 3),
	(1081, 'Hamstrings', 'Glute-Ham Raises', 10, 3),
	(1082, 'Hamstrings', 'Single-Leg Deadlifts', 12, 3),
	(1083, 'Hamstrings', 'Swiss Ball Hamstring Curls', 15, 3),
	(1084, 'Glutes', 'Squats', 12, 3),
	(1085, 'Glutes', 'Hip Thrusts', 12, 3),
	(1086, 'Glutes', 'Lunges', 10, 3),
	(1087, 'Glutes', 'Deadlifts', 12, 3),
	(1088, 'Glutes', 'Glute Bridges', 20, 3),
	(1089, 'Glutes', 'Cable Kickbacks', 15, 3);


