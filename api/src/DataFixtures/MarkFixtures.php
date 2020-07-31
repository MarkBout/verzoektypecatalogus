<?php

namespace App\DataFixtures;

use App\Entity\Property;
use App\Entity\RequestType;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MarkFixtures extends Fixture
{
    private $commonGroundService;
    private $params;

    public function __construct(CommonGroundService $commonGroundService, ParameterBagInterface $params)
    {
        $this->commonGroundService = $commonGroundService;
        $this->params = $params;
    }

    public function load(ObjectManager $manager)
    {
        //JA/NEE sticker bestellen

        //reqeust type
        $id = Uuid::fromString('7e3998c0-4e9d-41e2-b9dc-f0840efc44d9');
        $requestType = new RequestType();
        $requestType->setName('Ja/Nee sticker bestellen');
        $requestType->setDescription('Bestel via dit formulier een JA/NEE of NEE/NEE sticker.');
        $manager->persist($requestType);
        $requestType->setId($id);
        $manager->flush();
        $requestType = $manager->getRepository('App:RequestType')->findOneBy(['id' => $id]);

        //type sticker
        $id = Uuid::fromString('c77cb790-7a93-46c6-a280-7f35bb29097f');
        $property = new Property();
        $property->setTitle('Welke sticker wilt u hebben?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setRequired(true);
        $property->setEnum(['NEE/JA (u krijgt geen reclamedrukwerk, maar wel huis-aan-huisbladen)', 'NEE/NEE (u krijgt geen reclamedrukwerk en geen huis-aan-huisbladen)']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Postcode
        $id = Uuid::fromString('c9ed0d31-6296-4e65-9416-aa2a1c366ecd');
        $property = new Property();
        $property->setTitle('Postcode:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //huisnummer
        $id = Uuid::fromString('f0ab2b61-2a98-48c0-b984-58ab5fa8568f');
        $property = new Property();
        $property->setTitle('Huisnummer:');
        $property->setType('integer');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //huisnummer toevoeging
        $id = Uuid::fromString('afcf73a4-9d31-4104-baf2-039c0fae85e2');
        $property = new Property();
        $property->setTitle('Huisnummer toevoeging:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //straatnaam
        $id = Uuid::fromString('a48ca6a1-0dbe-4497-9034-8760e407c662');
        $property = new Property();
        $property->setTitle('Straatnaam:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Woonplaats
        $id = Uuid::fromString('5fc37fbe-14e8-48cf-ad32-0de22fa3bc57');
        $property = new Property();
        $property->setTitle('Woonplaats:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Emailadres
        $id = Uuid::fromString('825b1050-6dde-4d17-b180-6bde3204364f');
        $property = new Property();
        $property->setTitle('E-mailadres:');
        $property->setType('string');
        $property->setFormat('email');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Contactformulier bijzondere bijstand

        //reqeust type
        $id = Uuid::fromString('2d39a167-ea2e-49d9-96aa-fc5d199bd57c');
        $requestType = new RequestType();
        $requestType->setName('Contactformulier bijzondere bijstand');
        $property->setTitle('Contactformulier bijzondere bijstand');
        $requestType->setDescription('Wilt u weten of u in aanmerking komt voor bijzondere bijstand? Dat kan via dit contactformulier.');
        $manager->persist($requestType);
        $requestType->setId($id);
        $manager->flush();
        $requestType = $manager->getRepository('App:RequestType')->findOneBy(['id' => $id]);

        //textarea reden bijstand
        $id = Uuid::fromString('8835b122-7a8a-4dfc-86d9-e12254e9f676');
        $property = new Property();
        $property->setTitle('Voor welke kosten wilt u bijzondere bijstand aanvragen?');
        $property->setType('string');
        $property->setFormat('textarea');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //telefoonnummer
        $id = Uuid::fromString('52339b15-cd83-4710-b102-c06fc72cd727');
        $property = new Property();
        $property->setTitle('Telefoon');
        $property->setType('string');
        $property->setFormat('tel');
        $property->setDescription('telefoon nummer:');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Emailadres
        $id = Uuid::fromString('a0162fb5-bf38-4476-b834-dbb298b9ac9f');
        $property = new Property();
        $property->setTitle('E-mailadres:');
        $property->setType('string');
        $property->setFormat('email');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //email adres heraald
        $id = Uuid::fromString('91284651-b7a5-4b47-9108-24a7840c035e');
        $property = new Property();
        $property->setTitle('Herhaal e-mailadres:');
        $property->setType('string');
        $property->setFormat('email');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //ingevuld naar waarheid
        $id = Uuid::fromString('b2c127a1-c963-46dd-ae77-1a63de2c0b4c');
        $property = new Property();
        $property->setTitle('Zijn alle gegevens naar waarheid ingevuld?');
        $property->setType('string');
        $property->setFormat('checkbox');
        $property->setEnum(['Ja']);
        $property->setDescription('Nee, wijzig uw bovenstaande gegevens');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Stel uw vraag aan 1.Hoorn formuliier

        $id = Uuid::fromString('a3844f30-74d7-4fcc-84c0-5c81fea5dc2e');
        $requestType = new RequestType();
        $requestType->setName('Stel uw vraag aan 1.Zuid-drecht');
        $property->setTitle('Stel uw vraag aan 1.Zuid-drecht');
        $requestType->setDescription('Dit formulier gebruikt u als u een algemene vraag over zorg en ondersteuning wilt stellen. Als u uw gegevens invult, ontvangt u een antwoord via e-mail of telefoon. U kunt ook anoniem een melding maken. Als u hiervoor kiest, kunnen wij geen contact met u opnemen.');
        $manager->persist($requestType);
        $requestType->setId($id);
        $manager->flush();
        $requestType = $manager->getRepository('App:RequestType')->findOneBy(['id' => $id]);

        //Anoniem cantact
        $id = Uuid::fromString('fcbd0781-4f77-4943-a1e4-37e75afb3cc2');
        $property = new Property();
        $property->setTitle('Wilt u anoniem iets melden?');
        $property->setType('boolean');
        $property->setFormat('radio');
        $property->setRequired(true);
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Aangeven vraag of melding
        $id = Uuid::fromString('24d9151f-abfe-45c6-9b87-5b543acae91d');
        $property = new Property();
        $property->setTitle('Uw vraag of melding betreft');
        $property->setDescription('Kunt u aangeven op welk gebied u een vraag of melding heeft?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Wonen', 'Werk en inkomen', 'Opvoeden en opgroeien', 'Gezondheid en ondersteuning']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //textarea vraag of opmerking
        $id = Uuid::fromString('36708885-716b-4e12-a93a-614952217b4e');
        $property = new Property();
        $property->setTitle('Vraag of opmerking');
        $property->setType('string');
        $property->setFormat('textarea');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //telefoonnummer
        $id = Uuid::fromString('9410db4d-331f-4a54-9322-5db9148b9c90');
        $property = new Property();
        $property->setTitle('Telefoon');
        $property->setType('string');
        $property->setFormat('tel');
        $property->setDescription('telefoon nummer:');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Emailadres
        $id = Uuid::fromString('3493c557-83b8-4284-9653-09f7028b5676');
        $property = new Property();
        $property->setTitle('E-mailadres:');
        $property->setType('string');
        $property->setFormat('email');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Contact over vraag
        $id = Uuid::fromString('12e64bca-dd12-4c25-b119-01e9416fb1be');
        $property = new Property();
        $property->setTitle('Wilt u persoonlijk contact over deze vraag of melding?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Formulier Activiteit organiseren
        //reqeust type
        $id = Uuid::fromString('6a2b39fc-669d-4b6e-bbcc-27c8d8063f4e');
        $requestType = new RequestType();
        $requestType->setName('Activiteit organiseren');
        $property->setTitle('Activiteit organiseren');
        $requestType->setDescription('Wilt u een klein evenement organiseren in onze gemeente vul dan dit formulier in');
        $manager->persist($requestType);
        $requestType->setId($id);
        $manager->flush();
        $requestType = $manager->getRepository('App:RequestType')->findOneBy(['id' => $id]);

        //Naam evenement
        $id = Uuid::fromString('3210089c-30e7-4e32-b0ee-c7120924ff4a');
        $property = new Property();
        $property->setName('Naam klein evenement');
        $property->setTitle('Naam klein evenement');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Omschrijving klein evenement
        $id = Uuid::fromString('a92e3830-0c45-406b-a955-dfd00e01905c');
        $property = new Property();
        $property->setName('Omschrijving klein evenement');
        $property->setTitle('Omschrijving klein evenement');
        $property->setType('string');
        $property->setFormat('textarea');
        $property->setDescription("Omschrijf de activiteiten op uw evenement");
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Datum evenement
        $id = Uuid::fromString('b7415265-4f0f-4e35-9ee1-1774c5242ee3');
        $property = new Property();
        $property->setTitle('Datum klein evenement');
        $property->setType('string');
        $property->setFormat('date');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //mobilenummer
        $id = Uuid::fromString('dc3d50fb-106d-4fea-acb8-1323ac412744');
        $property = new Property();
        $property->setTitle('Mobiel nummer (tijdens evenement)');
        $property->setType('string');
        $property->setFormat('tel');
        $property->setDescription('Mobiel nummer:');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Begintijd event
        $id = Uuid::fromString('2b34d5f1-37fb-40a9-b171-61a9ccea3e16');
        $property = new Property();
        $property->setTitle('Begin evenement)');
        $property->setType('string');
        $property->setFormat('time');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Einddatum evenement
        $id = Uuid::fromString('ef793831-d09b-428f-a2d5-338943abe8b5');
        $property = new Property();
        $property->setTitle('Eind evenement');
        $property->setType('string');
        $property->setFormat('time');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //locatie evenement
        $id = Uuid::fromString('ee10e23b-0722-4744-95d9-db3d3a77291f');
        $property = new Property();
        $property->setTitle('locatie evenement');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //bezoekers evenement
        $id = Uuid::fromString('a4079fc0-7386-4262-8497-ba2ecb272395');
        $property = new Property();
        $property->setTitle('Aantal verwachte deelnamers/bezoekers');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //afsluiten evenement
        $id = Uuid::fromString('18271026-961a-4577-834b-f00c68df6a7a');
        $property = new Property();
        $property->setTitle('Wenst u straten en/of parkeerplaatsen af te sluiten?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja','Nee']);
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Situatieschets
        $id = Uuid::fromString('5a57828b-1232-4225-ad59-50c9347fbb98');
        $property = new Property();
        $property->setTitle('Situatieschets');
        $property->setType('string');
        $property->setFormat('file');
        $property->setDescription('In te dienen bijlage: situatieschets op schaal 1:1000 waaruit blijkt waaar het evenement wordt gehouden
        en welke objecten (met maatvoering) en afstanden op welke locatie worden geplaatst met, indien van toepassing de wegafsluiting. 
        Uit de situatieschets moet duidelijk blijken ook past op de betreffende locatie en dat er vrije doorgang overblijft voor hulpdiensten van minimaal 3.50 meter.');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //ingevuld naar waarheid
        $id = Uuid::fromString('81000444-8880-4ad4-82a3-0b53e9c1a233');
        $property = new Property();
        $property->setTitle('Zijn alle gegevens naar waarheid ingevuld?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja']);
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();
    }
}
