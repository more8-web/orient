import { Component, OnInit } from '@angular/core';

import { NewsLog } from "@context/models";
import { NewsLogDispatcher, NewsLogSelector } from "@context/store/news-log";


@Component({
  selector: 'app-news-log',
  templateUrl: './news-log.component.html',
  styleUrls: ['./news-log.component.css']
})
export class NewsLogComponent implements OnInit {

    logs: NewsLog[];

    constructor(private selector: NewsLogSelector,
                private dispatcher: NewsLogDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.logs = [...data]);

    }

}
