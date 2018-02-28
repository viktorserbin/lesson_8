<div>
    <p>Добавить новость</p>
    <form action="?page=insert_news" method="POST">
        <fieldset>
            <label for="news_name">Заголовк:</label><br />
            <input type="text" name="news_name" required size="80" /><br />
            <label for="news_date">Дата:</label><br />
            <input type="date" name="news_date" required size="20" /><br />
            <label for="news_text">Текст новости:</label><br />
            <textarea id="news_text" name="news_text" required
                      cols="80" rows="20"></textarea>
        </fieldset>
        <br />
        <fieldset>
            <input type="submit" value="Добавить новость" />
            <input type="reset" value="Осистить" />
        </fieldset>
    </form>
</div>
