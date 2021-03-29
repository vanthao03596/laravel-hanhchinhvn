const puppeteer = require('puppeteer');
const path = require('path');

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
    });
    const context = await browser.createIncognitoBrowserContext();
    const page = await context.newPage();
    await page.goto('https://danhmuchanhchinh.gso.gov.vn/');

    await page._client.send('Page.setDownloadBehavior', {
        behavior: 'allow',
        downloadPath: path.resolve(__dirname, 'downloaded'),
    });

    await page.evaluate(async() => {
        const $ = (selector, target = document) => target.querySelector(selector)
        const $$ = (selector, target = document) => Array.from(target.querySelectorAll(selector))
        const wait = (ms) => new Promise(res => setTimeout(res, ms))

        const $allTrs = $$('#ctl00_PlaceHolderMain_grid1_DXMainTable > tbody > tr')

        let i = 0
        for (let $tr of $allTrs){
            const rowId = i++
            const $img = $('img:nth-child(1)', $tr)

            $img.click()

            await wait(5000)

            const $chkPhuongXa = $(`#ctl00_PlaceHolderMain_grid1_dxdt${rowId}_check_I`)
            if(!$chkPhuongXa){
                continue
            }

            $chkPhuongXa.click()

            const $dlBtn = $(`#ctl00_PlaceHolderMain_grid1_dxdt${rowId}_ASPxButton2`)

            if(!$dlBtn){
                continue
            }

            $dlBtn.click()
            await wait(4000)
        }

    });

    await browser.close();
})();
