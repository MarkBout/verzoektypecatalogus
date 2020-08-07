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
        $requestType->setName('Stel uw vraag aan Zuid-Drecht');
        $property->setTitle('Stel uw vraag aan Zuid-Drecht');
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
        $property->setTitle('Uw vraag of melding betreft:');
        $property->setDescription('Kunt u aangeven op welk gebied u een vraag of melding heeft?');
        $property->setRequired(true);
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
        $property->setRequired(true);
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
        $property->setRequired(true);
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
        $property->setDescription('Omschrijf de activiteiten op uw evenement');
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
        $property->setTitle('Begin evenement');
        $property->setType('string');
        $property->setFormat('time');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Eindtijd evenement
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
        $property->setTitle('Aantal verwachte deelnemers/bezoekers');
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
        $property->setEnum(['Ja', 'Nee']);
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
        $property->setFormat('checkbox');
        $property->setEnum(['Ja']);
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Postcode
        $id = Uuid::fromString('145f99ba-3319-41d9-b035-a178239eeec1');
        $property = new Property();
        $property->setTitle('Postcode:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //huisnummer
        $id = Uuid::fromString('234daa9c-f4ae-4a54-b1d2-a57ae7cbaeff');
        $property = new Property();
        $property->setTitle('Huisnummer:');
        $property->setType('integer');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //straat
        $id = Uuid::fromString('abed58a6-3e16-42fb-bb15-8b4f197fb7fc');
        $property = new Property();
        $property->setTitle('Straatnaam:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //plaats
        $id = Uuid::fromString('4b3faaf9-f8f4-422c-869b-19103892316f');
        $property = new Property();
        $property->setTitle('Plaats:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Formulier alchol schenken
        $id = Uuid::fromString('30d63557-53e5-4393-a613-ca1debf278f4');
        $requestType = new RequestType();
        $requestType->setName('Aanvraag verguning Drank en Horicawet');
        $property->setTitle('Aanvraag verguning Drank en Horicawet');
        $property->setDescription('Een ondernemer moet een drank- en horecavergunning hebben om alcoholische dranken te schenken, Vraag deze hier aan.');
        $manager->persist($requestType);
        $requestType->setId($id);
        $manager->flush();
        $requestType = $manager->getRepository('App:RequestType')->findOneBy(['id' => $id]);

        //stage 1
        //bedrijfnaam
        $id = Uuid::fromString('889d5fc0-6709-42c5-b910-b992638e2755');
        $property = new Property();
        $property->setTitle('Naam bedrijf:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //kvknummer
        $id = Uuid::fromString('7130e972-64e1-4e8b-8a6e-fe6f61ad4db3');
        $property = new Property();
        $property->setTitle('KvK-nummer:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Adres bedrijf
        $id = Uuid::fromString('b2163bf1-1247-4670-a146-d9bd2ce703ef');
        $property = new Property();
        $property->setTitle('Adres bedrijf');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //postcode bedrijf
        $id = Uuid::fromString('9d3e1f91-51c3-4c55-9440-0e09aa19957a');
        $property = new Property();
        $property->setTitle('Postcode en woonplaats bedrijf:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //stage 2
        //telefoonnummer
        $id = Uuid::fromString('01a07273-6977-4b1b-87e6-96cf4930552d');
        $property = new Property();
        $property->setTitle('Telefoonnummer:');
        $property->setType('string');
        $property->setFormat('tel');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //Emailadres
        $id = Uuid::fromString('cb87cae2-1a8c-42de-8587-ee821b400032');
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

        //vergunninghouder
        $id = Uuid::fromString('574e80ce-8ec5-4c85-9a06-0057d6c20b5e');
        $property = new Property();
        $property->setTitle('De vergunning wordt aangevraagd voor de hiervoor genoemde natuurlijke of rechtspersoon.');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //stage 3
        //soort instelling
        $id = Uuid::fromString('d739487d-6e6a-4dce-be87-58b52194e955');
        $property = new Property();
        $property->setTitle('Voor welk soort instelling vraagt u een vergunning aan?');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //betrekking aanvraag
        $id = Uuid::fromString('55de8ff7-0513-4b09-b8de-dbec3f1ae343');
        $property = new Property();
        $property->setTitle('Waar heeft uw aanvraag betrekking op?');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //vragen over instelling
        $id = Uuid::fromString('9f05249d-bcc2-4f24-8580-0fd3de0a6d4d');
        $property = new Property();
        $property->setTitle('Wordt deze vergunning wordt aangevraagd voor een natuurlijke of rechtspersoon?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['natuurlijke persoon', 'rechtspersoon/rechtspersonenx']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //aangeven ruimte
        $id = Uuid::fromString('bd54116a-70d4-417f-8f98-b53b4309a9a9');
        $property = new Property();
        $property->setTitle('Welke ruimte:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //opervlakte
        $id = Uuid::fromString('5b6f5604-3188-4584-a936-c6ec3ea20994');
        $property = new Property();
        $property->setTitle('Oppervlakte in m2:');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //nog een ruimte
        $id = Uuid::fromString('bacf6482-7ed8-4231-9a01-dca12c292d8f');
        $property = new Property();
        $property->setTitle('Wilt u nog een ruimte melden?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //openingstijd
        // Maandag
        $id = Uuid::fromString('aebb8c79-8729-4cd8-8f3c-1e9ba3d201fa');
        $property = new Property();
        $property->setTitle('Maandag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //dinsdag
        $id = Uuid::fromString('f3e3c0e1-0793-4e09-a915-cbcadce69c8c');
        $property = new Property();
        $property->setTitle('Dinsdag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //woensdag
        $id = Uuid::fromString('98edf464-7bc6-454b-9d50-ec53dbe11083');
        $property = new Property();
        $property->setTitle('Woensdag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //donderdag
        $id = Uuid::fromString('6f80c433-e692-44b2-aa53-99938da49455');
        $property = new Property();
        $property->setTitle('Donderdag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //vrijdag
        $id = Uuid::fromString('a5256e20-c054-4ebf-a730-dae71f3c5bea');
        $property = new Property();
        $property->setTitle('Vrijdag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //zaterdag
        $id = Uuid::fromString('e18fef01-b3ac-4ddd-8ae6-5b2e299d6a77');
        $property = new Property();
        $property->setTitle('Zaterdag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //zondag
        $id = Uuid::fromString('7ecf8afe-c190-4a9d-9a8c-a7d261d056a8');
        $property = new Property();
        $property->setTitle('Zondag');
        $property->setType('string');
        $property->setFormat('tofrom-time');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //lijdinggevende
        $id = Uuid::fromString('704c0be6-1f9c-4623-8761-98ab5c8e9b15');
        $property = new Property();
        $property->setTitle('Hoeveel leidinggevenden zijn er?');
        $property->setType('string');
        $property->setFormat('text');
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //huurovereenkomst
        $id = Uuid::fromString('3d417e45-b0b3-405e-b725-83f2ae355268');
        $property = new Property();
        $property->setTitle('Huurovereenkomst of eigendombewijs');
        $property->setType('string');
        $property->setFormat('file');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //plattegrond
        $id = Uuid::fromString('0bdf1d97-0d24-415a-9371-7a7d60f4bd40');
        $property = new Property();
        $property->setTitle('Plattegrond van de inrichting');
        $property->setType('string');
        $property->setFormat('file');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //aanwezigheid
        $id = Uuid::fromString('66ccac5c-969a-4879-9f6a-a151f414c3f4');
        $property = new Property();
        $property->setTitle('Kunnen er, op enig moment meer dan 50 persoonen (incl. personeel) in de ruimte aanwezig zijn?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //ventilatie
        $id = Uuid::fromString('27864281-d32b-4eeb-816a-6edc691a83ea');
        $property = new Property();
        $property->setTitle('Opgave van de capaciteit in m3 per uur van de mechanische ventilatie-inrichting');
        $property->setType('string');
        $property->setFormat('file');
        $property->setRequired(true);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();

        //beroep horecawet
        $id = Uuid::fromString('a61c80cb-54d6-415a-8e46-ef5caa9fbd09');
        $property = new Property();
        $property->setTitle('Wilt U beroep doen op artiekel 46 van de drank en horecawet?');
        $property->setType('string');
        $property->setFormat('radio');
        $property->setEnum(['Ja', 'Nee']);
        $property->setRequestType($requestType);
        $manager->persist($property);
        $property->setId($id);
        $manager->persist($property);
        $manager->flush();
    }
}
