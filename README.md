Projet de fin de formation

Abschlussprojekt meiner Weiterbildung zur Webentwicklerin (École O'clock). Es handelt sich um eine Webanwendung auf Basis von PHP und Symfony.

Kurzbeschreibung: [Hier in 1–2 Sätzen beschreiben, was die Anwendung macht und für wen sie gedacht ist.]

Inhaltsverzeichnis
Funktionen
Technologien
Projektstruktur
Voraussetzungen
Installation
Tests
Autorin
Funktionen
[Funktion 1, z. B. Registrierung und Anmeldung von Benutzern]
[Funktion 2]
[Funktion 3]
Mehrsprachigkeit über die Symfony-Übersetzungsdateien (translations/)
Technologien
Backend: PHP, Symfony
Datenbank: relationale Datenbank mit Doctrine-Migrationen
Abhängigkeiten: Composer
Entwicklungsumgebung: Docker Compose
Tests: PHPUnit
Frontend: HTML5, CSS3, Twig-Templates
Projektstruktur
bin/            Konsolenbefehle (z. B. bin/console)
config/         Konfiguration der Anwendung
migrations/     Datenbankmigrationen
public/         Einstiegspunkt und öffentliche Dateien
src/            PHP-Quellcode (Controller, Entitäten, Repositories ...)
templates/      Twig-Templates
tests/          Automatisierte Tests
translations/   Übersetzungsdateien
ImportDB.sql    SQL-Datei zum Importieren der Datenbank
Voraussetzungen
PHP (Version laut composer.json)
Composer
Docker und Docker Compose
Optional: Symfony CLI
Installation
Repository klonen:
bash
   git clone https://github.com/Yelina13/Projet-de-fin-de-formation.git
   cd Projet-de-fin-de-formation
Abhängigkeiten installieren:
bash
   composer install
Umgebungsvariablen anpassen: Die Datei .env nach .env.local kopieren und dort die eigenen Werte eintragen (Datenbankzugang, E-Mail-Einstellungen usw.).
Docker-Container starten:
bash
   docker compose up -d
Datenbank einrichten, entweder mit den Migrationen:
bash
   php bin/console doctrine:migrations:migrate

oder durch Importieren der Datei ImportDB.sql in die Datenbank.

Anwendung starten:
bash
   symfony serve

Danach ist die Anwendung unter http://localhost:8000 erreichbar.

Tests
bash
php bin/phpunit
Hinweise zur Sicherheit

Zugangsdaten, Passwörter und API-Schlüssel gehören nicht ins Repository. Sie werden in der Datei .env.local gespeichert, die über .gitignore ausgeschlossen ist.

Autorin

Yelina13 GitHub: github.com/Yelina13
