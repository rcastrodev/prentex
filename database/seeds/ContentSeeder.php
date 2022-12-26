<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        Content::create([
            'section_id'=> 1,
            'order'     => 'AA',
            'image'     => 'images/home/CamperarojaIgnifugos.png',
            'content_1' => 'INDUMENTARIA TÉRMICA IGNÍFUGA',
        ]);

        Content::create([
            'section_id'=> 2,
            'order'     => 'A1',
            'image'     => 'images/home/image126.png',
            'content_2' => '1',
        ]);

        Content::create([
            'section_id'=> 2,
            'order'     => 'A1',
            'image'     => 'images/home/UnionIndustrialAglogo1.png',
            'content_2' => '2',
        ]);

        Content::create([
            'section_id'=> 3,
            'content_1' => 'Soluciones en seguridad industrial',
        ]);

        Content::create([
            'section_id'=> 4,
            'image'     => 'images/home/fotoparaPrentexPatagonia.png',
            'content_1' => 'Donde las exigencias marcan los límites, allí estamos.',
        ]);

        Content::create([
            'section_id'=> 5,
            'order'     => 'AA',
            'image'     => 'images/home/531.png',
            'content_1' => '<h2>EQUIPO SOLDADOR</h2><h4>Mascara</h4><p>Fabricada en un material resistente y de alta calidad, este producto esta hecho para resistir a las condiciones mas adversas de trabajo.</p><h4>Chaqueta</h4><p>Fabricada en un material resistente y de alta calidad, este producto esta hecho para resistir a las condiciones mas adversas de trabajo.</p><h4>Pantalón</h4><p>Fabricada en un material resistente y de alta calidad, este producto esta hecho para resistir a las condiciones mas adversas de trabajo.</p><h4>Guantes</h4><p>Fabricada en un material resistente y de alta calidad, este producto esta hecho para resistir a las condiciones mas adversas de trabajo.</p><h4>Calzado</h4><p>Fabricada en un material resistente y de alta calidad, este producto esta hecho para resistir a las condiciones mas adversas de trabajo.</p>',
        ]);
                
        /** Empresa */
        Content::create([
            'section_id'=> 6,
            'image'     => 'images/company/image20.png',
            'content_1' => 'Soluciones en seguridad Industrial',
            'content_2' => '<p>PRENTEX S.A. comienza su trayectoria en el año 1979, después de 25 años de experiencia de su fundador, el Sr. José Horacio VIEITES.</p><p>Inicialmente su actividad se centró en la fabricación de guantes tejidos. En la actualidad también fabrica otros tipos de guantes, indumentaria de seguridad, calzado, protectores lumbares y comercializa una amplia gama de Elementos de Protección Personal (EPP) y otros insumos de seguridad para plantas industriales, convirtiéndose para sus clientes en una empresa proveedora integral de todos los productos requeridos para la seguridad industrial en sus plantas y oficinas.</p>',
        ]);

    
        Content::create([
            'section_id'=> 7,
            'order'     => 'A1',
            'image'     => 'images/company/image122.png',
            'content_1' => '2018',
            'content_2' => '<p>Certificación de Prendas de Protección Contra Riesgo Arco Eléctrio. IRAM 3904.</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'image'     => 'images/company/image122.png',
            'content_1' => '2002',
            'content_2' => '<p>Se concluyen las instalaciones del TALLER DE COSTURA y se confeccionan las primeras prendas de seguridad contra derrame de metal fundido del país.</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'image'     => 'images/company/image103.png',
            'content_1' => '2001',
            'content_2' => '<p>​Certificamos con Ford en JUST IN TIME DE EPP</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'image'     => 'images/company/image122.png',
            'content_1' => '2008',
            'content_2' => '<p>Certificación de Prendas de Protección Contra Riesgo Arco Eléctrio. IRAM 3904.</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'image'     => 'images/company/image102.png',
            'content_1' => '1999',
            'content_2' => '<p>​PRIMERA EMPRESA EN CERTIFICAR ISO 9001:2008</p>',
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'A1',
            'content_1' => 'Casa Central',
            'content_2' => 'República del Líbano (Calle 10) N° 4174, Villa Lynch, San Martin, Bs As, Argentina',
            'content_3' => 'ventas@prentex.net',
            'content_4' => '+541147247200|+5411 4724-7200',
            'content_5' => 'prentexoficial' 
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'A2',
            'content_1' => 'Sucursal Patagonia',
            'content_2' => 'Chubut 346, Ciudad de Neuquén, Neuquén, Argentina',
            'content_3' => 'ventaspatagonia@prentex.net',
            'content_4' => '+5402994309257|+54 0299 4309257',
            'content_5' => 'prentexpatagonia' 
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'A3',
            'content_1' => 'Sucursal Cordoba',
            'content_2' => 'Maruzich 50, esq. Arroyo Saldán, La Calera, Cordoba Argentina',
            'content_3' => 'industriacordoba@prentex.net',
            'content_4' => '+543543464700|(543543)464700',
        ]);

        Content::create([
            'section_id'=> 9,
            'image'     => 'images/company/Group3.png',
            'content_1' => 'Disposición de productos',
            'content_2' => '<p>Trabajamos inmersos en el marco legal normativo que regula a las industrias nacionales y enconjunto con nuestros proveedores, en determinar la correcta forma de disposición final de los productos fabricados y comercializados una vez finalizado su ciclo de vida.</p><p>En referencia a esto surge que ningún producto se encuentra clasificado como residuo especial/peligroso y que pueden y deben ser dispuestos como residuos industriales estándar.</p>',
        ]);

        Content::create([
            'section_id'=> 10,
            'image'     => 'images/quality/Group16.png',
            'image2'     => 'images/quality/image111.png',
            'content_1' => 'Política Integral de Gestión',
            'content_2' => '<p>Somos una empresa líder en brindar soluciones integrales para la SEGURIDAD INDUSTRIAL. Estamos en una búsqueda permanente de innovación, de procesos, productos y servicios, generando soluciones a las necesidades de nuestros clientes. Continuamente reinventamos nuestros procesos para su simplificación y mayor efectividad.</p><p>Creemos en la importancia de una comunicación fluida, fortaleciendo el crecimiento mutuo y sustentable.</p>',
        ]);

        Content::create([
            'section_id'=> 12,
            'order'     => 'A1',
            'image'     => 'images/news/image76.png',
            'content_1' => 'Visitanos en la ExpoFerretera',
            'content_2' => '<p>Vamos a estar presentes en la prestigiosa feria de ferreteros del 1 al 4 de Diciembre.</p>',
            'content_3' => 'EVENTOS',
        ]);

        Content::create([
            'section_id'=> 12,
            'order'     => 'A2',
            'image'     => 'images/news/image762.png',
            'content_1' => 'Nueva Linea de Detectores de gás',
            'content_2' => '<p>Conocé sobre el nuevo equipamiento.</p>',
            'content_3' => 'PRODUCTOS',
        ]);

        Content::create([
            'section_id'=> 12,
            'order'     => 'A3',
            'image'     => 'images/news/image763.png',
            'content_1' => 'Entrega de mochilas y utiles escolares en Neuquen',
            'content_2' => '<p>Estubimos junto a los chicos de la Escuela San Martin.</p>',
            'content_3' => 'RESPONSABILIDAD SOCIAL',
        ]);
    }
}






