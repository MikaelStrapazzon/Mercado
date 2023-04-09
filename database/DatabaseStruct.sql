CREATE TABLE "product" (
    "id" SERIAL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id")
);

CREATE TABLE "product_type" (
    "id" SERIAL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id")
);

CREATE TABLE "tax" (
    "id" SERIAL,
    "name" VARCHAR(255) NOT NULL,
    "acronym" VARCHAR(6) NOT NULL,
    "default_percentage_value" FLOAT NOT NULL,
    PRIMARY KEY ("id")
);

CREATE TABLE "product_type_tax" (
    "id" SERIAL,
    "percentage_value" FLOAT,
    "id_product_type" INTEGER NOT NULL,
    "id_tax" INTEGER NOT NULL,
    PRIMARY KEY ("id")
);

CREATE TABLE "product_product_type" (
    "id" SERIAL,
    "id_product" INTEGER NOT NULL,
    "id_product_type" INTEGER NOT NULL,
    PRIMARY KEY ("id")
);

ALTER TABLE "product_type_tax" ADD FOREIGN KEY ("id_product_type") REFERENCES "product_type"("id");
ALTER TABLE "product_type_tax" ADD FOREIGN KEY ("id_tax") REFERENCES "tax"("id");

ALTER TABLE "product_product_type" ADD FOREIGN KEY ("id_product") REFERENCES "product"("id");
ALTER TABLE "product_product_type" ADD FOREIGN KEY ("id_product_type") REFERENCES "product_type"("id");