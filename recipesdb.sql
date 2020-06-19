CREATE TABLE recipetypes (
    recipetype_id INT(4) AUTO_INCREMENT PRIMARY KEY,
    recipetype_description VARCHAR(30)
);

INSERT INTO recipetypes (recipetype_description)
    VALUES ('Bakery Specials'),
    ('Beverages'),
    ('Bakery Standards'),
    ('Sides'),
    ('Soups'),
    ('Crockpot'),
    ('Miscellaneous');

CREATE TABLE recipes (
    recipe_id INT(4) AUTO_INCREMENT PRIMARY KEY,
    recipe_name VARCHAR(50),
    recipe_type INT(4),
    vegetarian TINYINT(1),
    vegan TINYINT(1),
    gluten_free TINYINT(1),
    cost_factor INT(4),
    time_factor INT(4),
    veggie_factor INT(4),
    serving_size INT(2),
    prep_time INT(3),
    cook_time INT(3),
    ingredients TEXT,
    spices TEXT,
    instructions TEXT,
    CONSTRAINT FK_recipetype FOREIGN KEY (recipe_type)
        REFERENCES recipetypes(recipetype_id)
);