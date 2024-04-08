CREATE TABLE pathounit (
    id INT IDENTITY(1,1) PRIMARY KEY, -- Auto-incrementing ID
    unitName VARCHAR(255),
    addedBy VARCHAR(100),
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP, -- Current timestamp
    modifiedBy VARCHAR(100),
    modifiedDate DATETIME
);

SELECT * FROM testmastersetn

SELECT * FROM stoolpara

select * from PathoReport WHERE subtest = 'Serum GPT (37 C)'

--delete from PathoReport

CREATE TABLE PathoReport (
    id INT IDENTITY(1,1) PRIMARY KEY,
    rno VARCHAR(MAX),
    opid VARCHAR(MAX),
    pname VARCHAR(MAX),
	servname VARCHAR(MAX),
    subtest VARCHAR(MAX),
    unit VARCHAR(MAX),
    normrang VARCHAR(MAX),
    inval VARCHAR(MAX),
    [status] VARCHAR(MAX),
    addedBy VARCHAR(MAX),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    modifiedBy VARCHAR(MAX),
    modifiedDate DATETIME
);

ALTER TABLE PathoReport
ADD subgroup VARCHAR(MAX) NULL;


SELECT p.id, p.rno, p.opid, p.pname, p.servname, r.rsex, r.rage, r.rdoc
FROM PathoReport AS p
INNER JOIN registration AS r ON p.rno = r.rno


ALTER TABLE PathoReport
ADD uploadReport VARCHAR(MAX) NULL;

delete from PathoReport

