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


			SELECT bd.pname AS pname, 
            bd.phone AS phone, 
            bd.rdocname AS rdocname,
            bd.billdate AS billdate, 
            bd.totalPrice AS totalPrice, 
            bd.totalAdj AS totalAdj, 
            bd.gst AS gst, 
            bd.billAmount AS billAmount, 
            bd.paidAmount AS paidAmount, 
            bd.balance AS balance, 
            bd.status AS status, 
            rs.rage AS rage, 
            rs.rsex AS rsex,
            rs.radd1 AS add1,
            rs.radd2 AS add2,
            rs.rcity AS city
            FROM billingDetails AS bd 
            INNER JOIN registration AS rs 
            ON bd.rno = rs.rno