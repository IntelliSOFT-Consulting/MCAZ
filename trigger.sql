CREATE TRIGGER trg_refids
BEFORE INSERT ON `references`
FOR EACH ROW
BEGIN
      DECLARE nrefid INT;
      SELECT  COALESCE(MAX(refid), 0) + 1
      INTO    nrefid
      FROM    `references`      
      WHERE   model = NEW.model and `year` = YEAR(CURDATE());
      SET NEW.refid = nrefid;
END;




  CREATE TRIGGER trg_posts_ref
BEFORE INSERT ON posts
FOR EACH ROW
BEGIN
      DECLARE nuser_id INT;
      SELECT  COALESCE(MAX(user_id), 0) + 1
      INTO    nuser_id
      FROM    posts    
      WHERE   title = NEW.title;
      SET NEW.user_id = nuser_id;
END;