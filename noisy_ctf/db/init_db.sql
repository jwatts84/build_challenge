CREATE DATABASE IF NOT EXISTS ctf;
USE ctf;
DROP TABLE IF EXISTS ads;

CREATE TABLE security_alerts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT
);

INSERT INTO security_alerts (title, description) VALUES
('Bicycle Heist Foiled', 'Noisy Echidna stopped Scattered Spider from encrypting mountain bikes across Brisbane. Pathched, spines deployed.'),
('Ransomware Apartment Rescue', 'LockBit tried locking down 2 bed CBD apartment. Noisy Echidna discovered zero day. Tenants safe.'),
('Collectibles Data Breach Thwarted', 'ShinyHunters attempted stealing 5.7M plushie loyalty points. Noisy Echidna detected reversed engined simulated attack. Zero data leaked.'),
('Office Chair Firmware Attack Blocked', 'Targeted ergonomic chairs. Noisy Echidna patched vulnerabilities mid-roll. Chairs secure.');



-- Grant FILE privilege to ctf user for INTO OUTFILE
GRANT FILE ON *.* TO 'ctf'@'%';
FLUSH PRIVILEGES;

