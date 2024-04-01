CREATE TABLE registration (
    id INT IDENTITY(1,1) PRIMARY KEY,
    rno VARCHAR(MAX),
    opid VARCHAR(MAX),
    se VARCHAR(MAX),
    rdate VARCHAR(MAX),
    rtime TIME DEFAULT GETDATE(),
    paymentType VARCHAR(MAX),
    rtitle VARCHAR(MAX),
    rfname VARCHAR(MAX),
    rmname VARCHAR(MAX),
    rlname VARCHAR(MAX),
    rsex VARCHAR(MAX),
    rage INT,
    fname VARCHAR(MAX),
    radd1 VARCHAR(MAX),
    radd2 VARCHAR(MAX),
    rcity VARCHAR(MAX),
    rdist VARCHAR(MAX),
    rstate VARCHAR(MAX),
    phone VARCHAR(MAX),
    dept VARCHAR(MAX),
    rdoc VARCHAR(MAX),
    rdocname VARCHAR(MAX),
    wamt VARCHAR(MAX),
    rcountry VARCHAR(MAX),
    addedBy VARCHAR(MAX),
    modifiedDate DATETIME DEFAULT GETDATE(),
    modifiedBy VARCHAR(MAX)
);

SELECT id, rno, opid, rdate, rtime, rfname, CONCAT(rfname, ' ', COALESCE(rmname, ''), ' ', rlname) AS fullname, 
rsex, rage, fname, phone, dept, paymentType, radd1, radd2, rcity, rdist, wamt, addedBy, rdoc
FROM registration

SELECT TOP 900 id, rno, rdate, rtime, rfname, CONCAT(rfname, ' ', COALESCE(rmname, ''), ' ', rlname) AS fullname, rsex, rage, fname, phone, radd1, rcity, rdist, wamt, addedBy
                                    FROM registration
                                    ORDER BY id DESC