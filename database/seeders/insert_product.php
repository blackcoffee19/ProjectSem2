<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id_type' => 1,
                'name' => "Corn",
                'quantity' => 5000,
                'description' => "Maize or corn or sheath (two parts nomenclature: Zea mays L. ssp. mays) is a food crop that was domesticated in Central America and then spread throughout the Americas. Maize spread to the rest of the world after European contact with the Americas in the late 15th and early 16th centuries. Maize is the most widely grown food crop in the Americas (in the Americas alone). In the United States, production is already about 270 million tons per year). Hybrid maize varieties are preferred by farmers over conventional maize varieties due to their high yield and hybrid advantages. While some varieties of maize can grow up to 7 m (23 ft) tall in some places,[1] commercial varieties of maize have been produced with a height of only about 2.5 m (8 ft). Sweet corn (Zea mays var. rugosa or Zea mays var. saccharata) is generally lower than that of other varieties.",
                'price' => 12000,
                'sale' => 10,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "calabash",
                'quantity' => 4000,
                'description' => "
                Herbaceous vines have branched tendrils, covered with many soft white hairs. Leaves are broad, heart-shaped, not lobed or widely lobed, with white velvety hairs; The peduncle has 2 glands at the apex. The flowers are unisexual at the same base, large, white, with flower stalks up to 20 cm long. Berries are light green or dark green, variegated or round, straight or waist-length, aged rind hardens, white flesh. Seeds white, 1.5 cm long. <br/>
                A long, cylindrical gourd with smooth green bark <br/>
                There are many things grown, differing by the shape and size of the fruit, such as:  <br/>
                - The fruit is cylindrical, long (sometimes up to 1m long), and has a spotted rind (star gourd). <br/>
                - Has a cylindrical fruit similar to a star gourd, but the rind has no spots. This is the type that is common in Vietnam (see photo below and thumbnail 2). <br/>
                - There are constriction fruits like wine gourds (Gourd Nam); This type can be used to make water bottles, wine bottles, and gourds. <br/>
                - Has solid fruit. This is a new variety in Vietnam with high yield and efficiency. People can both sell tops, gourd flowers, and sell fruits <br/>
                ",
                'price' => 10000,
                'sale' => 20,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "pumkin",
                'quantity' => 5000,
                'description' => "
                Pumpkin or pumpkin (called pumpkin in Southern dialect) is a type of string plant of the genus Cucurbita, family Cucurbitaceae. This is a common name for plants of the following species: Cucurbita pepo, Cucurbita mixta, Cucurbita maxima, and Cucurbita moschata.
                The origin of the pumpkin is unknown, but many believe that the pumpkin originated in North America. The oldest evidence of pumpkin seeds dating from 7000 to 5500 BC has been found in Mexico. This is the largest fruit in the world.
                Pumpkins weigh 0.45 kg or more and can weigh up to more than 450 kg, as was the case with an English farmer who planted a fruit that reached 608.3 kg. Pumpkin is spherical or cylindrical, when ripe, it is orange-yellow. The outside is notched and divided into segments. Pumpkin intestines have many seeds. Flat, oval seeds contain a lot of oil. Today's heaviest pumpkin was weighed in 2014, 1054 kg
                ",
                'price' => 18000,
                'sale' => 45,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "tomato",
                'quantity' => 4000,
                'description' => "Tomato (two part nomenclature: Solanum lycopersicum), belonging to the Solanaceae family, is a vegetable for food. The fruit is initially green, turning yellow to red when ripe. Tomatoes have a slightly sour taste and are a nutritious food, good for the body, rich in vitamins C and A, especially rich in healthy lycopene.
                Tomato belongs to the Ca family, plants in this family usually grow 1 to 3 meters in height, having soft stems that crawl on the ground or vines on other stems, such as grapes. This family of plants is a perennial in its native habitat, but it is now grown as an annual in temperate and tropical climates.
                ",
                'price' => 16000,
                'sale' => 36,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "carrot",
                'quantity' => 3500,
                'description' => "The carrot (from the French carotte /kaʁɔt/, scientific name: Daucus carota subsp. sativus) is a bulbous plant, usually red, yellow, white or purple. The edible part of the carrot is the tuber, which is actually its taproot, which contains many precursors of vitamin A, which is good for the eyes.
                In the wild, it is a biennial plant that develops a leaf reservoir during spring and summer, while accumulating large amounts of sugar in its fat taproot, storing energy for flowering throughout the year. Monday. Flowering stems can grow up to 1 m (3 ft) tall, with a canopy containing small white flowers, which produce fruit, known to botanists as pods
                Carrots are vegetables that contain just enough sodium to maintain blood pressure at a reasonable level in the body. People who consume carrots regularly will have a higher than average rate of maintaining blood pressure at a healthy level.
                ",
                'price' => 14000,
                'sale' => 25,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "eggplant",
                'quantity' => 4500,
                'description' => "Eggplant (two-part nomenclature: Solanum melongena) is a species of plant in the eggplant family with the same name, generally used as a culinary vegetable. Eggplant is closely related to tomato, potato, eggplant, eggplant and is native to southern India and Sri Lanka. Eggplant is an annual plant, growing to 40–150 cm (16–57 in) tall, usually spiny, with large coarsely lobed leaves, 10–20 cm long and 5–10 cm wide. Flowers white or purplish, with five-lobed corolla and yellow stamens.
                Eggplant fruit is a fleshy berry, less than 3 cm in diameter in wild plants, but much larger in cultivated varieties. The fruit contains many small and soft seeds. Wild varieties can be larger, growing to 225 cm (84 inches) tall and large leaves (up to 30 cm long and 15 cm wide). The name eggplant does not really reflect this fruit, because there are many other types of eggplant that are also purple or eggplants that are sometimes not purple. However, the name eggplant also does not reflect the true shape of the fruit, because the fruit of many eggplant varieties is not oval as elongated as the goat's but rather round, with a diameter of 5 cm to 8 cm. cm..
                ",
                'price' => 17000,
                'sale' => 32,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "White radish",
                'quantity' => 3900,
                'description' => "White radish (Japanese: Daikon-大根 - Great root, literally: large root) is a variety of radish plant. This variety has fast, long leaves (about 15 cm or more), white, and is native to Southeast or East Asia.They are used in Asian cuisine, in Japan they are ingredients for Daikon oden or radish stew (whole sliced) and sashimi accompaniment, in Vietnam they are the ingredients for pickled dishes. bread, and a stew in a bowl of noodles.
                In terms of benefits, white radish has the ability to lower serum cholesterol levels and triglyceride levels, while increasing HDL cholesterol (good cholesterol).The mild spicy substance in white radish helps to fight bacteria and relieve pain. Helps support the liver and prevent cardiovascular disease because of the biological active ingredient betaine. This substance supports the liver to work better, and at the same time reduces the amount of homocysteine in the blood plasma - one of the causes of cardiovascular disease.
                ",
                'price' => 14000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "onion",
                'quantity' => 4400,
                'description' => "Most plants of the genus Allium are collectively known as onions. In practice, however, the word onion is generally used to refer to a plant species with the dichotomous name Allium cepa.
                Onions include plant varieties: French red onion, red onion.
                Onions are vegetables, unlike onions, which are spices. If we can use both the leaves and the tubers, but our onions are actually very small, onions mainly use the bulbs. The onion bulb is the stem part of the onion plant. Onions are related to purple onions, which are often dried or dried to make onions. Onions originating from Central Asia were transmitted to Europe and then to Vietnam. This species is suitable for temperate climates.
                ",
                'price' => 8000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "bell pepper",
                'quantity' => 2000,
                'description' => "Bell peppers, also known as sweet peppers (called pepper in the United Kingdom of Great Britain and Northern Ireland, Canada, Ireland or capsicum[1] in India, Bangladesh, Australia, Singapore and New Zealand), are the fruit of a group of bell peppers. plants, species Capsicum annuum.[2] Plants of this species produce fruit in a variety of colors, including red, yellow, orange, green, chocolate/brown, vanilla/white, and purple. Bell peppers are sometimes classified as the least pungent peppers in the same category as sweet peppers. Bell peppers have meat, a lot of meat. Bell peppers are native to Mexico, Central America, and northern South America. The stem and seeds inside the bell pepper are edible, but some people will find it bitter.[3] Bell pepper seeds were brought to Spain in 1493 and from there spread throughout Europe, Africa, and Asia. Today, China is the world's largest exporter of bell peppers, followed by Mexico and Indonesia.",
                'price' => 10000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 1,
                'name' => "Lettuce",
                'quantity' => 5000,
                'description' => "Lettuce also known as cabbage, cauliflower (scientific name: Lactuca sativa) is a species of flowering plant in the Asteraceae family that was first scientifically described by botanist L. in 1753. It is commonly grown as a leafy vegetable, especially in salads, sandwiches, burgers and many other dishes.
                It is also known as lettuce, known since time immemorial for its refreshing, purifying and sedative properties. Its name comes from the milky (rubber) juice that oozes from the stems of vegetables after being cut
                Species Lactuca sativa include types such as:
                Iceburg Lettuce or Iceberg/crisphead: The outer leaf layer is greener and the inner leaf layer is whiter. This variety is most popular because of its crunchy leaf texture, mild flavor, and watery content. It is a rich source of choline (a naturally occurring amine, C5H15NO2, commonly classified as a B complex vitamin, and a component of many other important biomolecules, such as acetylcholine and lecithin).
                Romaine Lettuce or Cos Lettuce (Romaine Lettuce, Lettuce): Has long, dark green leaves. It has a crispy leaf texture and a richer flavor than other varieties. It is a rich source of vitamins A, C, B1 and B2, and folic acid.
                Butterhead Lettuce: This is a salad with large and loosely arranged leaves that are easy to separate from its stem. It has a softer leaf texture, with a sweeter flavor than its relative.
                Loose-leaf Lettuce: As the name suggests, this variety has discretely arranged leaves, with a wide, curly crown. It has a mild flavor and a slightly crunchy leaf texture.
                ",
                'price' => 28000,
                'sale' => 20,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "coconut",
                'quantity' => 4000,
                'description' => "Coconut (Cocos nucifera) is a species of woody plant, member of the family Arecaceae and the only living species of the genus Cocos.[1] Coconuts are ubiquitous in coastal tropical regions and are a tropical cultural icon. Coconuts provide food, fuel, cosmetics, folk medicine and building materials, among many other uses. The inner flesh of the ripe coconut, as well as the coconut milk that is extracted from it, is a familiar part of the diet of people living in the tropics and subtropics. The coconut fruit is different from other fruits because the endosperm contains a large amount of clear liquid, known as coconut water. Ripe coconuts are used as food, or processed to get coconut oil and coconut milk from the fruit pulp, charcoal from the hard shell and coir from the fibrous shell. The desiccated coconut meat is called copra, the oil and juice extracted from this is often used in cooking - frying in particular - as well as in soaps and cosmetics. Sweet coconut sap can be used as a drink or fermented into coconut wine, coconut vinegar. Hard shells, fibrous husks and long leaves can be used as raw materials to make a variety of interior decoration products.",
                'price' => 20000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "watermelon",
                'quantity' => 3900,
                'description' => "Watermelon (scientific name Citrullus lanatus) is a species of plant in the family Cucurbitaceae, a vine-like flowering plant native to West Africa. It is grown for its fruit. Watermelon (Citrullus lanatus) is a species of long, twisted vine in the flowering plant family Cucurbitaceae. There is evidence from watermelon seeds in Pharaoh's tombs in ancient Egypt. Watermelon is grown in tropical and subtropical regions worldwide for its edible fruit, is a special type of berry with a hard rind and no division in the fruit, botanically known as pepo. The flesh is sweet, succulent, often deep red to pink, with many black seeds, although seedless varieties have also been produced. The fruit can be eaten raw or processed, and the peel can be eaten after cooking. Breeding efforts have produced disease-resistant varieties of watermelon. Many varieties of watermelon plants can produce mature fruit within 100 days of planting.",
                'price' => 18000,
                'sale' => 45,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "pear",
                'quantity' => 2500,
                'description' => "Pears are native to coastal and temperate regions of the Old World, from western Europe and northern Africa eastward across Asia. They are moderately sized trees, growing to 10–17 m tall, often with tall, narrow foliage; Some species are shrubs. Their leaves are alternate, simple, 2–12 cm long, glossy green in some species, with dense silvery-white hairs in others; Leaf shape ranges from broad oval to narrow lanceolate. Most are deciduous, but 1-2 species in Southeast Asia are evergreen. Most species are cold tolerant, surviving temperatures down to between −25 °C and −40 °C in winter, with the exception of evergreen species, which are tolerant to colds only to about −15 ° C.",
                'price' => 29000,
                'sale' => 30,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "plum",
                'quantity' => 2800,
                'description' => "Plums are the fruit of several species in the subgenus Plums. Plums that are dried are called prunes. Plum is a fruit tree domesticated by humans very early. Plums have long appeared in cuisine in many parts of the world. Although there are many different species of plum, there are currently only two species of global commercial value, the plum plum and the European plum.

                Because plums are large and succulent, they are not suitable for making prunes, but with a long shelf life, the species dominates the fresh fruit market. European plums are quite firm, have a high content of soluble solids and do not ferment during the drying process, so most prunes on the market are made from this species.
                ",
                'price' => 30000,
                'sale' => 20,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/07/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "mangosteen",
                'quantity' => 4600,
                'description' => "Mangosteen (Garcinia mangostana), also known as sweet garlic[2], is a species of tree in the Clusiaceae family. It is also a tropical evergreen tree with edible fruit, native to the island nations of Southeast Asia. Its origin is uncertain due to extensive prehistoric cultivation.[3][4] It grows mainly in Southeast Asia, Southwest India and other tropical areas such as Colombia, Puerto Rico and Florida,[3][5][6] where the tree has been introduced. The tree is 6 to 25 m (19.7 to 82.0 ft) tall.[3] The fruit when ripe has a thick outer skin, dark purple red color, the skin is inedible.[3][5] The flesh is ivory white, succulent, slightly fibrous and divided into many segments, a fruit can contain about 4, 8 packs, very rarely 3 or 9. The fruit has a sweet and sour taste and an attractive aroma. Within each fruit, the edible aromatic flesh surrounding each seed is the vegetative pod, i.e. the inner layer of the ovary.[7][8] The seeds are almond-shaped and small in size.",
                'price' => 45000,
                'sale' => 25,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "durian",
                'quantity' => 3400,
                'description' => "Durian is considered by many in Southeast Asia as the (king of fruits). It is characterized by its large size, strong odor, and many sharp spines surrounding its shell. The fruit can reach 30 centimeters (12 in) in length and 15 centimeters (6 in) in diameter, often weighing one to three kilograms (2 to 7 lb). Depending on the species, the fruit has an oblong to round shape, the color of the peel is from green to brown, and the color of the fruit is from light yellow to red.
                The flesh of the fruit is edible, and gives off a characteristic, heavy and strong odor, even when the rind is intact. Some people find durian to have a pleasant sweet aroma, but others are intolerable and uncomfortable with the smell. The scent of durian produces reactions ranging from fascination to intense disgust, and has been described as rotten onion, turpentine or sewage. Due to the long-lasting smell of durian, it is banned from some hotels and public transport in Southeast Asia.
                ",
                'price' => 220000,
                'sale' => 10,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "apple",
                'quantity' => 5000,
                'description' => "Apples contain a lot of nutrients that are beneficial to your health such as Carb, fiber, sugar, fat, vitamin C, potassium, magnesium, etc. Although providing many nutrients, an apple only contains 52 nutrients. calories.
                Besides, another reason why many people choose this fruit is that it is delicious and can be processed in many different ways. When combined with other foods, the dishes from apples will be more diverse and rich, bringing delicious and attractive flavors while still ensuring nutritional value.
                ",
                'price' => 49000,
                'sale' => 40,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/04/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "pinapple",
                'quantity' => 4600,
                'description' => "Pineapple has other names such as: pineapple, pineapple, ba la, scientific name Ananas comosus, is a tropical fruit. Pineapple is native to Paraguay and southern Brazil.
                The commonly called pineapple fruit is actually the axis of the flower and the succulent bracts gathered together, and are indeed the (pineapple eyes). Pineapple is eaten fresh or canned as slices, slices, juices or mixed juices. There are two types of pineapples, pineapples with thorns and without thorns: pineapples with thorns, the West called (clumps)and those without thorns called (Thomas).
                Pineapple has spiny leaves that grow in asterisk clusters. The leaves are long and lance-shaped and have margins with serrations or spines. The flowers grow from the central part of the asterisk-shaped leaves, each with its own sepals. They grow in strong head-shaped clusters on short, stout stems. The sepals become fat and watery and develop into a complex known as the pineapple fruit (false fruit), which grows above the asteroid clusters of leaves.
                ",
                'price' => 20000,
                'sale' => 25,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "litchi",
                'quantity' => 3600,
                'description' => "Litchi is a tropical woody fruit tree, native to southern China; where it is known as 荔枝 (pinyin: luizhī, Sino-Vietnamese: le chi), distributed south to Indonesia and east to the Philippines (where it is called alupag).
                Litchi is an evergreen tree of medium size, growing to 15–20 m tall, with alternately pinnate leaves, each 15–25 cm long, with 2-8 lateral leaflets 5–10 cm long. and no leaflets at the apex. The newly sprouted young leaves are bright copper-red, then gradually turn green when reaching their maximum size. The flowers are small, greenish-white or yellowish-white, in panicles up to 30 cm long.
                The fruit is a drupe, globose or slightly oblong, 3–4 cm long and 3 cm in diameter. The outer skin is red, rough texture, inedible but easily peeled. Inside is a layer of translucent white flesh, sweet and rich in vitamin C, with a texture similar to that of grapes. In the center of the fruit is a brown seed, 2 cm long and 1-1.5 cm in diameter. The seeds - similar to those of the horse chestnut fruit - are mildly toxic and should not be eaten. Fruit ripens from June (in regions near the equator) to October (in regions far from the equator), about 100 days after flowering.
                ",
                'price' => 40000,
                'sale' => 15,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/08/2022 00:00:00')
            ],
            [
                'id_type' => 2,
                'name' => "mango",
                'quantity' => 4000,
                'description' => "Mango is a sweet-tasting fruit of the genus Mango, which includes numerous tropical fruits, grown mainly as edible fruit. The majority of species found in the wild are wild mangoes. They all belong to the Anacardiaceae family of flowering plants. The mango is native to South and Southeast Asia, from where it has been distributed worldwide to become one of the most cultivated fruits in the tropics. The highest densities of the genus Mango (Magifera) are found west of Malesia (Sumatra, Java and Borneo) and in Myanmar and India.[1] While other Mangifera species (e.g. horse mango, M. Foetida) are also grown on a more local basis, Mangifera indica - common mango or Indian mango - is a mango tree commonly grown only in many areas. tropical and subtropical regions. It is native to India and Myanmar.[2] It is the national fruit of India, Pakistan, the Philippines, and the national tree of Bangladesh.[3] In some cultures, its fruit and leaves are used as ceremonial decorations at weddings, celebrations, and religious ceremonies.",
                'price' => 35000,
                'sale' => 40,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "beef",
                'quantity' => 5000,
                'description' => "Cow is the common name for animals in the genus Bos with the scientific name Bos, including bison and domestic cows. The genus Bos can be divided into 4 subgenus: Bos, Bibos, Novibos, Poephagus, but the distinction between them is still controversial. This genus currently has 5 extant species. However, some authors consider this genus to have up to 7 species because domesticated cattle breeds are also considered separate species by them.
                The Bovine family is known from fossil records from the Early Miocene, about 20 Ma. The earliest bovines, such as Eotragus, were small animals, somewhat similar to present-day Gazelles and probably lived in woodland habitats. The number of bovine species increased sharply in the Late Miocene, when many species adapted to a more open and grassland environment.
                The greatest number of modern species of the bovine family belongs to Africa, while the largest but less diverse populations are found in Asia and North America. Many species of this family are thought to have evolved in Asia but were unable to survive due to predation by humans from Africa in the late Pleistocene. In contrast, African species have many thousands or millions of years to adapt to the gradual development of human hunting skills. However, many of the domesticated species in this family are of Asian origin (goats, sheep, buffalo and yaks). This may be because these species are less afraid of humans and more docile.
                ",
                'price' => 250000,
                'sale' => 20,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "plaice",
                'quantity' => 3700,
                'description' => "In addition to sea bream fish, now in our country there are also freshwater pomfrets. Freshwater pompano has the scientific name of Colossoma brachypomum, originated in the Amazon region, South America, and was imported into our country in 1998.
                This fish gives delicious meat, and grows 3-4 times faster than other fish species, currently being raised in many localities. The freshwater white pomfret has a silvery gray color or a bluish silver color, the upper and lower jaws of the fish both have sharp teeth that work to tear food (small fish, shrimp, shrimp...).
                Lives off the coast of the Middle East, South Asia, Southeast Asia. This fish is prized in the Indo-Pacific region for its taste. It is often confused with Trachinotus carolinus, which lives off the coast of the Gulf of Mexico.
                ",
                'price' => 380000,
                'sale' => 40,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "Snakehead fish",
                'quantity' => 2500,
                'description' => "Fish family (other names: Banana fish, Snakehead fish, Lobster fish, Tilapia fish, Betel nut, flatfish, Dolphin, depending on the region) are fish species of the family Channidae. This family has 2 genera and the living species is Channa, currently known with 39 species, Parachanna currently has 3 species in Africa.
                In Vietnam, mainly Channa maculata (there is a document called Ophiocephalus maculatus / Bostrychus maculatus) and Channa argus (also known as Ophiocephalus argus or Chinese fruit fish).
                Dorsal fin with 40 - 46 rays; anal fin with 28 - 30 rays, lateral scales 41 - 55. The head of the Channa maculata has a pattern similar to the word most and the two letters bowl while the head of the Channa argus is relatively pointed and long like a snake's head. Their head is flat compared to the body, the scales are gray-brown streaked with light gray spots. The back is brownish black.
                ",
                'price' => 29000,
                'sale' => 10,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/04/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "tuna",
                'quantity' => 9000,
                'description' => "Tuna (also known as humpback fish) is a large fish of the family Scombridae, mainly of the genus Thunnus, living in warm seas, about 185 km from the shore. In Vietnam, Tuna is the local name for bigeye tuna and yellowfin tuna[1]. Tuna is a particularly delicious seafood, very nutritious (bigeye tuna), processed into a variety of delicious dishes and created a valuable source of export goods.
                Tuna fishing in Vietnam was born in 1994, thanks to the effort of discovering the fishing method of Phu Yen fishermen. After that, this profession gradually spread, becoming the strength of fishermen in the South Central Coast such as Quang Ngai, Binh Dinh, Phu Yen, Khanh Hoa.... On average, Binh Dinh fishermen can catch 10,000 tons of fish each year. Ocean tuna (CNDD), accounting for more than 50% of the country's total catch
                ",
                'price' => 43000,
                'sale' => 20,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "mackerel",
                'quantity' => 9800,
                'description' => "Mackerel is the common name applied to several different species of fish mainly from the Tuna family. They inhabit both tropical and temperate seas. The vast majority of mackerel species live offshore in marine environments, but some, for example Spanish mackerel (Spanish mackerel, scientific name Scomberomorus maculatus) are inshore and can be found near coastal areas. bridge and jetty. The largest type of mackerel is King Mackerel (scientific name Scomberomorus cavalla) which can grow up to 1.68 m long. The common feature of all types of mackerel is a long, slender body (different from tuna, which has a gourd body), with many small fins located behind the large fins on the back and abdomen. Mackerel, if it has scales, is also very small.
                Mackerel is preferred and caught a lot because of its rich meat and fish oil; They are also known to be capable of fighting. Mackerel is an important object in the industrial fishery and recreational fishing industry. The flesh of mackerel is perishable, rapidly decomposing, especially in hot and humid tropical environments, and so can cause poisoning if eaten rotten fish. Unless handled and stored properly, mackerel must be made into food the same day. For this reason, mackerel has traditionally been sold in London even on Sundays and it is also the only fish that must be salted when making sushi.
                ",
                'price' => 30000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/05/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "goat",
                'quantity' => 1000,
                'description' => "Goat meat is a food meat from domestic goats, which is an important and popular food source in some countries such as Bangladesh, Nepal, Sri Lanka, Pakistan, India and some regions in Vietnam (with The specialty is Ninh Binh mountain goat), goat meat is said to be a nutritious food and has the effect of enhancing physiological ability.
                Goat meat has a delicious taste, has a nutritious effect, keeps warm very well, very suitable to eat in the cold season.[4] In general, goat meat has the effect of promoting blood circulation, increasing body temperature, useful in treating tuberculosis, bronchitis, asthma. Nutritious dishes that are easy to prepare such as porridge, goat meat stewed with garlic, goat meat stewed with carrots, stewed with wine... According to oriental medicine, goat meat is a nutritious food, helping to cure many diseases.
                ",
                'price' => 330000,
                'sale' => 1,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "chicken",
                'quantity' => 10000,
                'description' => "Chicken or chicken, Hill chicken (three-part nomenclature: Gallus gallus domesticus) is a subspecies of bird that has been domesticated by humans thousands of years ago. Some suggest that this species descended from wild birds in India and tropical red junglefowl in Southeast Asia. In the bird world, chickens are the most dominant species with 24 billion individuals (statistics in 2003).[1] People often use chicken meat, chicken eggs and chicken feathers. In addition, today, people also use chicken to do scientific research experiments in the fields of biology, physics, chemistry.
                Chickens are omnivores. In the wild, they often dig through the soil looking for seeds, insects, lizards or young mice. The lifespan of chickens can range from five to ten years depending on the breed.[2] The oldest hen in the world lived for 16 years and was recorded in the Guinness Book of Records.[3] Roosters often look different from hens by their colorful plumage, long and glossy tail, and the pointed feathers on the neck and back that are usually lighter and darker in color. However, in some chicken breeds such as the Sebright, the rooster has the same color as the hen, only slightly different in the slightly pointed neck feathers. Males can be differentiated from hens based on the cock's crest or the growth of spurs on the rooster's legs. Adult chickens also have fleshy bibs on their necks below their beaks. Both roosters and hens have crests and abs, but in most breeds these are only prominent in roosters. In some breeds, a mutation occurs that causes the chicken's head to have a feather that looks like a human beard.
                Although generally light birds can fly short distances at low altitudes, such as over hedges or bushes, most domestic birds are burrowing birds and are not able to fly as far as those that fly with Full body structure adapted for aerial behavior. Chickens sometimes fly in bursts when exploring their surroundings or hiding from danger.
                ",
                'price' => 190000,
                'sale' => 10,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '19/02/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "pork",
                'quantity' => 10000,
                'description' => "The domestic pig or domestic pig is a domesticated breed of wild boar, raised for meat. Most domestic pigs have a thin coat on the surface of their skin. The domestic pig is often thought to be a subspecies from their wild ancestor, the wild boar, in which case they are given the biological name Sus scrofa domesticus. Some taxonomists consider domestic pigs a separate species and name them Sus domesticus, and wild boar S. scrofa. Wild boars joined humans 13,000–12,700 years ago. Domestic pigs escaped from captivity have returned to the wild in some parts of the world (e.g., New Zealand) and pose a number of environmental hazards as pests.
                Domesticated pigs are mostly considered a subspecies of their wild ancestor, Sus scrofa according to Carl Linnaeus in 1758, giving in this case the official name Sus scrofa domesticus. In 1777, Johann Christian Polycarp Erxleben classified the domesticated pig as an independent species from the wild, and named it Sus domesticus, which is still used by some taxonomists.
                ",
                'price' => 220000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "lamb",
                'quantity' => 1200,
                'description' => "Lamb is similar in appearance to duck and beef, but good lamb is a meat with a smooth, tender, highly elastic texture that seems a bit pliable. A piece of meat that has a light pink to red cut, a little white fat inside the meat is fresh, a piece of lamb that has turned purple or yellow fat is the lamb has not reached the best quality. The characteristic of lamb is that it has a pungent smell due to the sharp fat attached to it.
                Lamb meat is also a strange dish that contains a lot of nutrients beneficial to health, especially the immune system, nervous system, memory... Lamb helps to add many nutrients and blood, to help keep the penis healthy. . Compared with goat, the content of nutrients in lamb is not inferior. Lamb meat is delicious, rich in nutrients, low in fat, low in cholesterol, plus the sheep only eat grass, so it is clean, so lamb is being chosen by many consumers.
                ",
                'price' => 500000,
                'sale' => 10,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')
            ],
            [
                'id_type' => 3,
                'name' => "Buffalo",
                'quantity' => 5000,
                'description' => "Buffalo meat is the meat of domestic buffalo species. Buffalo meat is an important food source for the inhabitants of South Asia and Southeast Asia where buffalo farming is common. In terms of nutritional value, buffalo meat is not inferior to other types of meat such as beef or pork, even has some advantages such as buffalo meat with the advantage of low fat, high iron content, welding properties but not toxic, suitable for cooking in hot season[1]. Buffalo meat with buffalo horns, buffalo milk, buffalo teeth, many other parts such as buffalo skin, liver viscera, spleen, buffalo stomach are used. Compared to beef, in fact, buffalo meat and beef have the same nutritional value and deliciousness",
                'price' => 500000,
                'sale' => 0,
                'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/04/2022 00:00:00')
            ],




        ];
        try {
            foreach ($products as $pro) {
                DB::table('product')->insert($pro);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
